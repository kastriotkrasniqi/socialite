<?php

namespace App\Models;

use App\Models\Comment;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;


    protected $guarded = [];


    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($post) {
            $post->comments()->delete();
            $post->likes()->delete();
        });
    }


    public function user()
    {
        return $this->belongsTo(User::class);
    }


     /**
     * Get all of the post's comments.
     */
    public function comments(): MorphMany
    {
        return $this->morphMany(Comment::class, 'commentable')->chaperone();
    }


    public function likes()
    {
        return $this->morphMany(Like::class, 'likeable');
    }
}
