<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Post;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use App\Category;
use Illuminate\Support\Facades\Mail;
use App\Mail\NewPost;
use App\Models\Admin;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::where('user_id',Auth::user()->id)->where('status',1)->latest()->get();
        return view('user.pages.post.index',compact('posts'));
        
    }    
    /**
     * pending post
     *
     * @return void
     */
    public function pending(){
        $posts = Post::where('user_id',Auth::user()->id)->where('status',0)->latest()->get();
        return view('user.pages.post.pending',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Category::latest()->get();
        return view('user.pages.post.create',compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|min:5|max:200|unique:posts',
            'category' => 'required',
            'tags' => 'required',
            'body' => 'required',
            'image' => 'required|image|mimes:jpg,png,jpeg',
        ]);

        $post = new Post();
        $post->title = $request->title;
        $post->body = $request->body;
        $post->category_id =$request->category;
        $post->slug = strtolower(str_replace(' ','-',$request->title));
        $image = $request->image;
        $imageName = $post->slug . uniqid() . '.' . $image->getClientOriginalExtension();
        
        if(!Storage::disk('public')->exists('post')){
            Storage::disk('public')->makeDirectory('post');
        }

        $postImage = Image::make($image)->resize(752, 501, function ($constraint) {
            $constraint->aspectRatio();
            $constraint->upsize();
        })->stream();

        Storage::disk('public')->put('post/'.$imageName,$postImage);

        $post->image = $imageName;
        $post->created_at = Carbon::now();
        $post->user_id = Auth::id();
        $post->status = 0;
        $post->save();
        //send mail
        $admins = Admin::all();
        
        foreach($admins as $admin){
            Mail::to($admin->email)->queue(new NewPost($post,'You have a new post approve request'));
        }
        //end sending
        $tags = [];
        $tagcollection = array_map('trim', explode(',',$request->tags));
        foreach($tagcollection as $tag){
            array_push($tags,['name'=>$tag]);
        }
        $post->tags()->createMany($tags);
        $notification=array(
            'message'=>'Successfully Save Post!',
            'alert-type'=>'success'
        );
        return redirect()->route('user.post.index')->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::findOrFail($id);
        $category = Category::latest()->get();
        return view('user.pages.post.view',compact('category','post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::findOrFail($id);
        $category = Category::latest()->get();
        return view('user.pages.post.edit',compact('category','post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|max:200|min:5|unique:posts,title,' . $id,
            'category' => 'required',
            'tags' => 'required',
            'body' => 'required',
        ]);
        $post = Post::findOrFail($id);
        $post->title = $request->title;
        $post->body = $request->body;
        $post->category_id =$request->category;
        $post->slug = strtolower(str_replace(' ','-',$request->title));

        if($request->image != null){
            $request->validate([
                'image' => 'required|image|mimes:jpg,png,jpeg',
            ]);
            $image = $request->image;
            $imageName = $post->slug . uniqid() . '.' . $image->getClientOriginalExtension();
            
            if(!Storage::disk('public')->exists('post')){
                Storage::disk('public')->makeDirectory('post');
            }
            //delete old image
            if(Storage::disk('public')->exists('post')){
                Storage::disk('public')->delete('post/' . $post->image);
            }

            $postImage = Image::make($image)->resize(752, 501, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            })->stream();

            Storage::disk('public')->put('post/'.$imageName,$postImage);    
        }else{
            $imageName = $post->image;
        }    

        $post->image = $imageName;
        $post->updated_at = Carbon::now();
        $post->user_id = Auth::id();
        if($post->status == 1){
            $post->status = 1;
        }else{
            $post->status = 0;
        } 
        $post->save();
        $post->tags()->delete();
        $tags = [];
        $tagcollection = array_map('trim', explode(',',$request->tags));
        foreach($tagcollection as $tag){
            array_push($tags,['name'=>$tag]);
        }
        $post->tags()->createMany($tags);
        $notification=array(
            'message'=>'Successfully Update Post! 🥰',
            'alert-type'=>'success'
        );
        return redirect()->back()->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        if (Storage::disk('public')->exists('post/' . $post->image)) {
            Storage::disk('public')->delete('post/' . $post->image);
        }
        $post->delete();
        $notification=array(
            'message'=>'Successfully Delete Post!',
            'alert-type'=>'success'
        );
        return redirect()->back()->with($notification);
    }
    public function likedUsers($post){
        $posts = Post::findOrFail($post);
        return view('user.pages.post.likeduser',compact('posts'));
    }
    public function favourite(){
        $user = Auth::user();
        $likePosts = $user->likedPost()->get();
        return view('user.pages.favourite.index',compact('likePosts'));
    }
}
