<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Models\Admin;
use phpDocumentor\Reflection\Types\Null_;

class Post extends Model
{
    /**
     * Get all of the comments for the Post
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function tags()
    {
        return $this->hasMany('App\Tag', 'PostId', 'id');
    }
    /**
     * Get the category that owns the Post
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    // Define Scope
    // published()
    public function scopePublished($query)
    {
        return $query->where('status', 1);
    }
    /**
     * Get the user that owns the Post
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function admin()
    {
        return $this->belongsTo(Admin::class, 'admin_id', 'id');
    }
    public function user() 
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    /**
     * Get all of the comments for the Post
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function comments()
    {
        return $this->hasMany('App\Comment');
    }

    // many to many
    public function likedUsers()
    {
        return $this->belongsToMany('App\User')->withTimestamps();
    }

      
}
