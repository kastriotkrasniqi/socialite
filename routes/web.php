<?php

use App\Http\Controllers\FriendshipController;
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



Route::middleware('auth')->group(function () {

    // PROFILE
    Route::get('/profile/{id}', [ProfileController::class, 'show'])->name('profile.show');


    // TIMELINE
    Route::get('/', [TimelineController::class, 'index'])->name('timeline');


     // NOTIFICATIONS
    Route::group(['prefix' => 'notifications'], function () {
        Route::get('/', [NotificationsController::class, 'index'])->name('api.notifications');

        Route::post('/{notification}/markAsRead', [NotificationsController::class, 'markAsRead'])->name('notification.read');
    });


    // GLOBAL SEARCH
    Route::post('/search', SearchController::class)->name('search.results');



    // FRIENDSHIP
    Route::group(['prefix' => 'friendship'], function () {
        Route::post('/{id}/send', [FriendshipController::class, 'send'])->name('friends.request');

        Route::post('/{id}/accept', [FriendshipController::class, 'accept'])->name('friend.accept');

        Route::post('/{id}/deny', [FriendshipController::class, 'deny'])->name('friend.deny');

        Route::post('/{id}/remove', [FriendshipController::class, 'remove'])->name('friend.remove');
    });



    // POST
    Route::group(['prefix' => '/post'], function () {
        Route::post('/', [PostController::class, 'store'])->name('post.store');

        Route::delete('/{id}', [PostController::class, 'destroy'])->name('post.destroy');

    });



    //COMMENT
    Route::group(['prefix' => 'comment'], function () {
        Route::post('/', [CommentController::class, 'store'])->name('comment.store');
        Route::delete('/{id}', [CommentController::class, 'destroy'])->name('comment.destroy');
        Route::put('/{id}', [CommentController::class, 'update'])->name('comment.update');
    });

    // LIKE
    Route::post('/like', LikeController::class)->name('like.store');

});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
