<?php

namespace App\Http\Controllers\Fontend;

use App\Category;
use App\Http\Controllers\Controller;
use App\Post;
use App\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index(){
        $posts = Post::where('status',1)->latest()->take(6)->get();
        return view('fontend.pages.index',compact('posts'));
    }
    public function posts(){
        $posts = Post::where('status',1)->latest()->paginate(6);
        return view('fontend.pages.posts',compact('posts'));
    }
    public function post($slug){
        $post = Post::where('slug',$slug)->where('status',1)->first();
        // dd($post);
        return view('fontend.pages.post',compact('post'));
    }
    public function categories(){
        $categories = Category::all();
        return view('fontend.pages.categories',compact('categories'));
    }
    public function categoryPost($slug){
        $category = Category::where('slug',$slug)->first();
        $posts = $category->posts()->published()->paginate(10);
        return view('fontend.pages.categoryPost',compact('posts','category'));
    }
    public function search(Request $request){
        $request->validate([
            'search' => 'required|max:150'
        ]);
        $search = $request->search;
        $posts = Post::where('title','like',"%$search%")->published()->paginate(10);
        $posts->appends(['search'=>$search]);
        return view('fontend.pages.search',compact('posts','search'));
    }
    public function tagPost($name){
        $query = $name;
        $tags = Tag::where('name','like',"%$name%")->paginate(10);
        $tags->appends(['search'=>$name]);
        return view('fontend.pages.tagPost',compact('tags','query'));
    }

    public function likePost($post){
        $user = Auth::user();
        $likePosts = $user->likedPost()->where('post_id',$post)->count();
        if($likePosts == 0){
            $user->likedPost()->attach($post);
        }else{
            $user->likedPost()->detach($post);
        }
        return redirect()->back();
         
    }

    //get like by ajax request
    public function getLike(Request $request){
        $post = Post::where('id',$request->post_id)->first();
        return $post->likedUsers->count();
    }
    //check like
    public function checkLike(Request $request){
        if(Auth::guard('web')->check()){
            $user = Auth::user();
            return $likePosts = $user->likedPost()->where('post_id',$request->post_id)->count();
            // if($likePosts == 0){
            //     return false;
            // }else{
            //     return true;
            // }

        }else{
            return 'not';
        }
        
    }
    
}
