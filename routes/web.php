<?php

use App\Category;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;


Auth::routes();
//send mail


//social login
//github
Route::get('login/github', 'Auth\LoginController@github');
Route::get('login/github/callback', 'Auth\LoginController@githubRedirect');
//github
Route::get('login/google', 'Auth\LoginController@google');
Route::get('login/google/callback', 'Auth\LoginController@googleRedirect');

Route::get('/','Fontend\HomeController@index')->name('home.index');
Route::get('/posts','Fontend\HomeController@posts')->name('posts');
Route::get('/post/{slug}','Fontend\HomeController@post')->name('post');
Route::get('/categories','Fontend\HomeController@categories')->name('categories');
Route::get('/category/{slug}','Fontend\HomeController@categoryPost')->name('category.post');
Route::get('/search','Fontend\HomeController@search')->name('search');
Route::get('/tag/{name}','Fontend\HomeController@tagPost')->name('tag.post');
Route::post('/comment/{post}', 'Fontend\CommentController@store')->name('comment.store');
Route::post('/comment-reply/{comment}', 'Fontend\ReplyController@store')->name('reply.store');
Route::post('/like-post', 'Fontend\HomeController@likePost')->name('post.like');
//ajax
Route::get('/get-like', 'Fontend\HomeController@getLike')->name('get.like');
Route::get('/check-like-not', 'Fontend\HomeController@checkLike')->name('check.like');
//test send mail
Route::get('/send', 'Fontend\HomeController@mail');

Route::get('/home', 'HomeController@index')->name('home');

Route::prefix('user')->group(function(){
    Route::middleware('auth:web')->group(function(){
        Route::get('profile', 'User\ProfileController@index')->name('user.profile');
        Route::post('profile/update', 'User\ProfileController@update')->name('user.profile.update');
        Route::get('profile/password', 'User\ProfileController@password')->name('user.profile.password');
        Route::post('profile/password/change', 'User\ProfileController@passwordUpdate')->name('user.profile.password.update');

        Route::resource('post', 'User\PostController',['names' => 'user.post']);
        Route::get('/post-pending', 'User\PostController@pending')->name('user.post.pending');
        Route::get('/post-liked-users/{post}', 'User\PostController@likedUsers')->name('like.users');
        Route::get('/comment','User\CommentController@index')->name('user.comment.index');
        Route::delete('/comment/{id}', 'User\CommentController@destroy')->name('user.comment.destroy');
        Route::get('/comment-reply','User\ReplyCommentController@index')->name('user.comment.reply');
        Route::delete('/comment-reply/{id}', 'User\ReplyCommentController@destroy')->name('user.reply.destroy');
    });
});


Route::prefix('admin')->group(function () {

    Route::middleware('auth:admin')->group(function () {
        Route::get('/', 'Backend\DashboardController@index')->name('admin.dashboard');
        Route::get('profile', 'Backend\ProfileController@index')->name('admin.profile');
        Route::post('profile/update', 'Backend\ProfileController@update')->name('admin.profile.update');
        Route::get('profile/password', 'Backend\ProfileController@password')->name('admin.profile.password');
        Route::post('profile/password/change', 'Backend\ProfileController@passwordUpdate')->name('admin.profile.password.update');
        Route::resource('roles', 'Backend\RolesController',['names' => 'admin.roles']);
        Route::resource('admins', 'Backend\AdminsController',['names' => 'admin.admins']);
        Route::resource('category', 'Backend\CategoryController',['names' => 'admin.category']);
        Route::resource('post', 'Backend\PostController',['names' => 'admin.post']);
        Route::get('/post-liked-users/{post}', 'Backend\PostController@likedUsers')->name('post.like.users');
        Route::get('/comment','Backend\CommentController@index')->name('comment.index');
        Route::delete('/comment/{id}', 'Backend\CommentController@destroy')->name('comment.destroy');
        Route::get('/comment-reply','Backend\ReplyCommentController@index')->name('comment.reply');
        Route::delete('/comment-reply/{id}', 'Backend\ReplyCommentController@destroy')->name('reply.destroy');
    });
    

    //admin login routes
    Route::get('/login','Backend\Auth\LoginController@showLoginForm')->name('admin.login');
    Route::post('/login/submit','Backend\Auth\LoginController@login')->name('admin.login.submit');
    //logout routes
    Route::post('/logouts/submit','Backend\Auth\LoginController@logout')->name('admin.logout.submit');
    //forget password routes
    Route::get('/password/reset','Backend\Auth\ForgotPasswordController@showLinkRequestForm')->name('admin.password.request');

    Route::post('/password/email','Backend\Auth\ForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');

    Route::get('/password/reset/{token}','Backend\Auth\ResetPasswordController@showResetForm')->name('admin.password.reset');

    Route::post('/password/reset','Backend\Auth\ResetPasswordController@reset')->name('admin.password.update');

    
});

