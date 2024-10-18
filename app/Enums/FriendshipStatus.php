<?php

namespace App\Enums;

enum FriendshipStatus: int
{
    case PENDING   = 0;

    case ACCEPTED  = 1;

    case DENIED  = 2;

    case BLOCKED   = 3;
}
