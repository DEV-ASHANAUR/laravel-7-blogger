<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use App\Category;
use App\Post;
use App\Tag;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);

        View::composer('fontend.layouts.partials.sidebar', function ($view) {
            $categories = Category::all()->take(10);
            $recentPost = Post::latest()->take(3)->get();
            $recentTags = Tag::all();
            return $view->with('categories', $categories)->with('recentPost',$recentPost)->with('recentTags',$recentTags);
        });
    }
}
