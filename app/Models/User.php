<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\Post;
use App\Models\Friendship;
use App\Traits\HasFriends;
use Spatie\Sluggable\HasSlug;
use App\Enums\FriendshipStatus;
use Spatie\Sluggable\SlugOptions;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasFriends, HasSlug;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'username',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }


    /**
     * Get the options for generating the slug.
     */
    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('username')
            ->usingSeparator('_')
            ->slugsShouldBeNoLongerThan(50);
    }


    /**
     * Get the route key for the model.
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'username';
    }



    /**
     * Get all posts made by friends using hasManyThrough.
     */
    public function friendPosts()
    {
        return $this->hasManyThrough(Post::class, Friendship::class, 'user_id', 'user_id', 'id', 'friend_id')
            ->where('friendships.status', FriendshipStatus::ACCEPTED->value);
    }


    public function posts()
    {
        return $this->hasMany(Post::class);
    }

}
