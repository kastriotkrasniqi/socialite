<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    /** @use HasFactory<\Database\Factories\LikeFactory> */
    use HasFactory;
    protected $fillable = ['user_id'];

    // Polymorphic relationship
    public function likeable()
    {
        return $this->morphTo();
    }

    // Relationship to the user who liked
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
