<?php

namespace App\Enums;

enum NotificationType: string
{
    case FRIEND_REQUEST = 'friend_request';
    case FRIEND_REQUEST_ACCEPTED = 'friend_request_accepted';
}
