<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/','fontend\HomeController@index')->name('home.index');
Route::get('/posts','fontend\HomeController@posts')->name('posts');
Route::get('/post/{slug}','fontend\HomeController@post')->name('post');



Route::get('/home', 'HomeController@index')->name('home');

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
    });
    

    //login routes
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