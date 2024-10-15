<?php

use App\Models\User;
use Inertia\Inertia;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Application;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TimelineController;
use App\Notifications\Friendship\FriendRequest;
use App\Http\Controllers\NotificationsController;


// Route::get('/{username}', [ProfileController::class, 'show'])->middleware(['auth', 'verified']);

Route::get('/',[TimelineController::class,'index'])->middleware(['auth', 'verified'])->name('timeline');


Route::post('/timeline/{user}/sendFriendRequest',[TimelineController::class,'sendFriendRequest'])->name('friends.request');


Route::post('/notifications/{notification}/markAsRead',[NotificationsController::class,'markAsRead'])->name('notification.read');

Route::get('/api/notifications',[NotificationsController::class,'index'])->name('api.notifications')->middleware('auth');


Route::post('/post',[PostController::class,'store'])->name('post.store')->middleware('auth');


Route::post('/comment',[CommentController::class,'store'])->name('comment.store')->middleware('auth');

Route::post('/like',[LikeController::class,'store'])->name('like.store')->middleware('auth');


Route::post('/search',[SearchController::class,'index'])
->middleware('auth')
->name('search.results');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
