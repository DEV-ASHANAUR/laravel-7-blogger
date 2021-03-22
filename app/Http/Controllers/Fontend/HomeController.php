<?php

namespace App\Http\Controllers\Fontend;

use App\Http\Controllers\Controller;
use App\Post;
use Illuminate\Http\Request;

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
}
