<?php

namespace App\Http\Controllers\Fontend;

use App\CommentReply;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReplyController extends Controller
{
    public function store(Request $request,$comment){
           
        $request->validate([
            'reply' => 'required|max:250',
        ]);

        $reply = new CommentReply();
        $reply->comment_id = $comment;
        if(Auth::guard('admin')->check()){
            $admin = Auth::guard('admin')->user()->id;
            $reply->admin_id = $admin;
        }else{
            $user = Auth::user()->id;
            $reply->user_id = $user;
        }  
        $reply->reply = $request->reply;
        $reply->created_at = Carbon::now();
        $reply->save();

        return back();

    }
}
