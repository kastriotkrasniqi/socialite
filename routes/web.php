<?php

use App\Models\User;
use Inertia\Inertia;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Application;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TimelineController;
use App\Notifications\Friendship\FriendRequest;
use App\Http\Controllers\NotificationsController;


// Route::get('/{username}', [ProfileController::class, 'show'])->middleware(['auth', 'verified']);

Route::get('/',[TimelineController::class,'index'])->middleware(['auth', 'verified'])->name('timeline');


Route::post('/timeline/{user}/sendFriendRequest',[TimelineController::class,'sendFriendRequest'])->name('friends.request');


Route::post('/notifications/{notification}/markAsRead',[NotificationsController::class,'markAsRead'])->name('notification.read');

Route::get('/api/notifications',[NotificationsController::class,'index'])->name('api.notifications')->middleware('auth');



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
