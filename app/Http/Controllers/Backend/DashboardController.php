<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Category;
use App\Comment;
use App\Post;
use App\User;
use DB;

class DashboardController extends Controller
{
    public $user;

    public function __construct()
    {
        // $this->middleware('auth:admin');
        $this->middleware(function($request,$next){
            $this->user = Auth::guard('admin')->user();
            return $next($request);
        });
    }
    public function index()
    {
        if(is_null($this->user) || !$this->user->can('dashboard.view')){
            abort(403, 'Sorry !! You are Unauthorized to View Dasboard !');
        }
        $total_roles = count(Role::select('id')->get());
        $total_admin = count(Admin::select('id')->get());
        $total_permission = count(Permission::select('id')->get());
        $total_user = count(User::select('id')->get());
        $total_cat = count(Category::select('id')->get());
        $total_post = count(Post::select('id')->get());
        $total_comment = count(Comment::select('id')->get());
        $like = \DB::table('post_user')->get();
        $likeCount = $like->count();
        // dd($likeCount);
        $total_pending = count(Post::where('status','0')->select('id')->get());
        return view('backend.pages.dashboard.index',compact('total_roles','total_admin','total_permission','total_user','total_cat','total_post','total_comment','total_pending','likeCount'));
    }
}
