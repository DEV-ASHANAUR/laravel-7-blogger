<?php

namespace App\Http\Controllers\Backend;

use App\Comment;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function index(){
        $comments = Comment::latest()->get();
        return view('backend.pages.comment.index',compact('comments'));
    }
    public function destroy($id){
        $comment = Comment::findOrFail($id);
        $comment->delete();
        $notification=array(
            'message'=>'Successfully Delete Comment 👍 ',
            'alert-type'=>'success'
        );
        return redirect()->back()->with($notification);
    }
}
