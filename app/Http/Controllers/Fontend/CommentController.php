<?php

namespace App\Http\Controllers\Fontend;

use App\Comment;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function store(Request $request,$post){
        // dd($request->all());       
        $request->validate([
            'comment' => 'required|max:250',
        ]);

        $comment = new Comment();
        $comment->post_id = $post;
        if(Auth::guard('admin')->check()){
            $admin = Auth::guard('admin')->user()->id;
            $comment->admin_id = $admin;
        }else{
            $user = Auth::user()->id;
            $comment->user_id = $user;
        }  
        $comment->comment = $request->comment;
        $comment->created_at = Carbon::now();
        $comment->save();

        return back();

    }
}
