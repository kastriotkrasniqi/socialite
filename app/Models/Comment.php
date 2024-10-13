<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = ['body', 'user_id'];

    // Polymorphic relationship
    public function commentable()
    {
        return $this->morphTo();
    }

    // Relationship to the user who made the comment
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function replies()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }


    public function likes()
    {
        return $this->morphMany(Like::class, 'likeable');
    }
}
