<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    public function store(Request $request)
    {
        $request->validate(['post_id' => 'required|exists:posts,id']);

        $post = Post::findOrFail($request->post_id);

        $like = $post->likes()->where('user_id', $request->user()->id)->first();

        if ($like) {
            $like->delete();
            $isLiked = false;
        } else {
            $post->likes()->create(['user_id' => $request->user()->id]);
            $isLiked = true;
        }

        return response([
            'is_liked' => $isLiked,
            'likes_count' => $post->likes()->count(),
        ]);
    }
}
