<?php

namespace App\Http\Controllers\Backend;

use App\CommentReply;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ReplyCommentController extends Controller
{
    public function index(){
        $reply = CommentReply::latest()->get();
        return view('backend.pages.comment.reply',compact('reply'));
    }
    public function destroy($id){
        $reply_comment = CommentReply::findOrFail($id);
        $reply_comment->delete();
        $notification=array(
            'message'=>'Successfully Delete Comment 👍 ',
            'alert-type'=>'success'
        );
        return redirect()->back()->with($notification);
    }
}
