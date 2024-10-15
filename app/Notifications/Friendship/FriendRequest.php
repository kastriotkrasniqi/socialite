<?php

namespace App\Notifications\Friendship;

use App\Models\User;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Bus\Queueable;
use App\Enums\NotificationType;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Notifications\Messages\BroadcastMessage;

class FriendRequest extends Notification implements ShouldBroadcast
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public function __construct(public User $user)
    {
        //
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['database', 'broadcast'];
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            'type' => NotificationType::FRIEND_REQUEST->value,
            'user' => $this->user->only('id', 'name', 'email', 'username'),
            'message' => ucfirst($this->user->name) . ' has sent you a friend request',
            'url' => '/' . $this->user->username,
        ];
    }

    /**
     * Get the broadcastable representation of the notification.
     *
     * @return BroadcastMessage
     */
    public function toBroadcast(object $notifiable): BroadcastMessage
    {
        return new BroadcastMessage([
            'type' => NotificationType::FRIEND_REQUEST->value,
            'user' => $this->user->only('id', 'name', 'email', 'username'),
            'message' => ucfirst($this->user->name) . ' has sent you a friend request',
            'url' => '/' . $this->user->username,
        ]);
    }

}
