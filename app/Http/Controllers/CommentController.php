<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'body' => 'required|min:1|',
        ]);

        $post = Post::findOrFail($request->post_id);
        $post->comments()->create([
            'body' => $request->body,
            'user_id' => $request->user()->id,
        ]);

        return back();
    }
}
