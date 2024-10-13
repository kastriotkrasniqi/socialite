<?php

namespace App\Traits;

use App\Models\User;
use App\Enums\FriendshipStatus;

trait HasFriends
{


    /**
     * Get all friends of the user.
     */
    public function friends()
    {
        return $this->belongsToMany(User::class, 'friendships', 'user_id', 'friend_id')
            ->withPivot('status')
            ->wherePivot('status', FriendshipStatus::ACCEPTED->value)
            ->withTimestamps();
    }

    /**
     * Get the users who have sent a friend request to this user.
     */
    public function friendRequests()
    {
        return $this->belongsToMany(User::class, 'friendships', 'friend_id', 'user_id')
            ->withPivot('status')
            ->wherePivot('status', FriendshipStatus::PENDING->value)
            ->withTimestamps();
    }

    /**
     * Get the users to whom this user has sent friend requests.
     */
    public function pendingFriendRequests()
    {
        return $this->belongsToMany(User::class, 'friendships', 'user_id', 'friend_id')
            ->withPivot('status')
            ->wherePivot('status', FriendshipStatus::PENDING->value)
            ->withTimestamps();
    }



    /**
     * Send a friend request to another user.
     */
    public function sendFriendRequest(User $user)
    {
        if ($this->hasSentFriendRequestTo($user) || $this->isFriendsWith($user)) {
            return false; // Already sent a request or already friends
        }

        $this->friends()->attach($user->id, ['status' => FriendshipStatus::PENDING->value]);

        return true;
    }

    /**
     * Accept a friend request from another user.
     */
    public function acceptFriendRequest(User $user)
    {
        if (!$this->hasFriendRequestFrom($user)) {
            return false; // No friend request to accept
        }

        $this->friendRequests()->updateExistingPivot($user->id, ['status' => FriendshipStatus::ACCEPTED->value]);

        $this->friends()->attach($user->id, ['status' => FriendshipStatus::ACCEPTED->value]); // Make it mutual

        return true;
    }

    /**
     * Deny a friend request from another user.
     */
    public function denyFriendRequest(User $user)
    {
        if (!$this->hasFriendRequestFrom($user)) {
            return false; // No friend request to deny
        }

        $this->friendRequests()->detach($user->id); // Remove the request
        return true;
    }

    /**
     * Remove a friend.
     */
    public function deleteFriend(User $user)
    {
        if (!$this->isFriendsWith($user)) {
            return false; // Not friends
        }

        // Detach both sides of the friendship
        $this->friends()->detach($user->id);
        $user->friends()->detach($this->id);

        return true;
    }

    /**
     * Get mutual friends between this user and another user.
     */
    public function mutualFriends(User $user)
    {
        return $this->friends()->whereIn('friend_id', $user->friends()->pluck('friend_id'))->get();
    }


    /**
     * Check if there is a pending friend request from another user.
     */
    public function hasFriendRequestFrom(User $user)
    {
        return $this->friendRequests()
                    ->where('user_id', $user->id)
                    ->exists();
    }

    /**
     * Check if the user has sent a friend request to another user.
     */
    public function hasSentFriendRequestTo(User $user)
    {
        return $this->pendingFriendRequests()
                    ->where('friend_id', $user->id)
                    ->exists();
    }

    /**
     * Check if the user is friends with another user.
     */
    public function isFriendsWith(User $user)
    {
        return $this->friends()
                    ->where('friend_id', $user->id)
                    ->exists();
    }

    public function notFriendsWith()
    {
        // Get the IDs of users who are friends, including pending friends
        $friendIds = $this->friends()->pluck('friend_id')
            ->merge($this->pendingFriendRequests()->pluck('friend_id'))
            ->unique()
            ->values();

        // Get all users except those who are already friends
        return User::whereNotIn('id', $friendIds)
            ->where('id', '!=', $this->id) // Exclude the current user
            ->get();
    }
}
