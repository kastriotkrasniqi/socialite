<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use App\Http\Resources\UserResource;
use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'body' => $this->body,
            'created_at' => $this->created_at,
            'created_at_diff_human' => $this->created_at->diffForHumans(),
            'user' => new UserResource($this->user),
            'comments' => CommentResource::collection($this->comments()->paginate(10)),
            'comments_count' => $this->comments_count,
            'likes_count' => $this->likes_count,
            'isLiked' => $this->likes()->where('user_id', $request->user()->id)->exists(),
        ];
    }
}
