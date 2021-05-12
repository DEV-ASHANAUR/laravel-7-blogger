<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Comment;
use App\Post;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // return view('home');
        $recent_comment = array();
        $user_post = Post::where('user_id',Auth::user()->id)->where('status','1')->latest()->get();
        foreach($user_post as $post){
            $comment = Comment::where('post_id',$post->id)->latest()->get();
            array_push($recent_comment,$comment->toArray());
        }
        // dd($recent_comment);
        $comments = array();
        foreach($recent_comment as $commentsall){
            
            // $count = count($comments);
            for ($i=0; $i < count($commentsall); $i++) { 
                array_push($comments,$commentsall[$i]);
            }
        }
        // dd($comments);
        
        // for ($i=0; $i < count($recent_comment); $i++) { 
        //     array_push($comments,$recent_comment[$i][$i]);
        // }

        // dd($comments);

        $user = Auth::user();
        $total_post = count(Post::where('user_id',$user->id)->where('status','1')->select('id')->get());
        $total_pending = count(Post::where('user_id',$user->id)->where('status','0')->select('id')->get());
        $likePosts = $user->likedPost()->count();
        
        return view('user.pages.dashboard.index',compact('total_post','total_pending','likePosts','comments'));
    }
}
