<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Comment;
use Illuminate\Http\Request;
use App\Http\Resources\CommentResource;
use Illuminate\Database\Eloquent\Model;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'body' => 'required|min:1',
        ]);

        $post = Post::findOrFail($request->post_id);
        $post->comments()->create([
            'body' => $request->body,
            'user_id' => $request->user()->id,
        ]);


        return response([
            'comments' => CommentResource::collection($post->comments()->paginate(10))->response()->getData(),
            'comments_count' => $post->comments()->count(),
        ]);
    }


    public function update(Request $request){
        $comment = Comment::findOrFail($request->id);

        $comment->update([
            'body' => $request->body
        ]);
    }



    public function destroy(Request $request){
        $comment = Comment::findOrFail($request->id);
        $comment->delete();
    }
}
