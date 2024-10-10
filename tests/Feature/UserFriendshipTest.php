<?php

use App\Enums\FriendshipStatus;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

beforeEach()->only();

test('a user can send a friend request', function () {
    $userA = User::factory()->create();
    $userB = User::factory()->create();

    $userA->sendFriendRequest($userB);

    $friendship = $userB->friendRequests;

    expect($friendship->contains($userA))->toBeTrue();

    $friendRequest = $friendship->where('id', $userA->id)->first();

    expect($friendRequest->pivot->status)->toBe(FriendshipStatus::PENDING->value);
});

test('a user can accept a friend request', function () {
    $userA = User::factory()->create();
    $userB = User::factory()->create();

    $userA->sendFriendRequest($userB);
    $userB->acceptFriendRequest($userA);

    $friendship = $userB->friends
    ->where('id', $userA->id)
    ->first();

    expect($friendship->pivot->status)->toBe(FriendshipStatus::ACCEPTED->value);

    expect($userA->friends->contains($userB))->toBeTrue();
    expect($userB->friends->contains($userA))->toBeTrue();
});

test('a user can deny a friend request', function () {
    $userA = User::factory()->create();
    $userB = User::factory()->create();

    $userA->sendFriendRequest($userB);
    $userB->denyFriendRequest($userA);

   // Check that the friendship record no longer exists after denial
   $friendshipExists = DB::table('friendships')
   ->where('user_id', $userA->id)
   ->where('friend_id', $userB->id)
   ->exists();

    expect($userB->hasFriendRequestFrom($userA))->toBeFalse();
    expect($userA->isFriendsWith($userB))->toBeFalse();
    expect($friendshipExists)->toBeFalse();

});

test('a user can delete a friend', function () {
    $userA = User::factory()->create();
    $userB = User::factory()->create();

    $userA->sendFriendRequest($userB);
    $userB->acceptFriendRequest($userA);

    $userA->deleteFriend($userB);

    expect($userA->friends->contains($userB))->toBeFalse();
    expect($userB->friends->contains($userA))->toBeFalse();
});

test('mutual friends are correctly identified', function () {
    $userA = User::factory()->create();
    $userB = User::factory()->create();
    $userC = User::factory()->create();

    $userA->sendFriendRequest($userB);
    $userB->acceptFriendRequest($userA);

    $userA->sendFriendRequest($userC);
    $userC->acceptFriendRequest($userA);

    expect($userB->mutualFriends($userC)->contains($userA))->toBeTrue();
    expect($userC->mutualFriends($userB)->contains($userA))->toBeTrue();
});
