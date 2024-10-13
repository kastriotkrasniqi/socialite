<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class Notifications extends JsonResource
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
            'type' => $this->data['type'],
            'read_at' => $this->read_at,
            'created_at' => $this->created_at,
            'created_at_for_human' => $this->created_at->diffForHumans(),
            'url' => $this->data['url'],
            'user' => [
                'id' => $this->data['user']['id'],
                'name' => $this->data['user']['name'],
                'username' => $this->data['user']['username'],
                'email' => $this->data['user']['email'],
                'message' => $this->data['message'],
            ],

        ];
    }
}
