<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Models\Admin;
use App\User;
use App\CommentReply;

class Comment extends Model
{
    /**
     * guarded
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * Get the user that owns the Comment
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    /**
     * Get the Admin that owns the Comment
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function admin()
    {
        return $this->belongsTo(Admin::class, 'admin_id', 'id');
    }

    /**
     * Get the user that owns the Comment
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function post()
    {
        return $this->belongsTo('App\Post');
    }
    /**
     * Get all of the replies for the Comment
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function replies()
    {
        return $this->hasMany('App\CommentReply');
    }
}
