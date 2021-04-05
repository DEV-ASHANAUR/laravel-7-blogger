<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\CommentReply;

class ReplyCommentController extends Controller
{
    public function index(){
        $reply = CommentReply::where('user_id',Auth::user()->id)->latest()->get();
        return view('user.pages.comment.reply',compact('reply'));
    }
}
