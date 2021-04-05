<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Comment;
use App\CommentReply;


class CommentController extends Controller
{
    public function index(){
        $comments = Comment::where('user_id',Auth::user()->id)->latest()->get();
        return view('user.pages.comment.index',compact('comments'));
    }
    public function destroy($id){
        $comment = Comment::findOrFail($id);
        if($comment->user_id == Auth::user()->id){
            CommentReply::where('comment_id',$comment->id)->delete();
            $comment->delete();
            $notification=array(
                'message'=>'Successfully Delete Comment 👍 ',
                'alert-type'=>'success'
            );
            return redirect()->back()->with($notification);
        }else{
            $notification=array(
                'message'=>'You Can Not Delete This Comment!',
                'alert-type'=>'error'
            );
            return redirect()->back()->with($notification);
        }
    }
}
