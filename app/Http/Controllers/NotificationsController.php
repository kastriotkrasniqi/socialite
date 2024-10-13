<?php

namespace App\Http\Controllers;

use App\Http\Resources\Notifications;
use App\Http\Resources\NotificationsCollection;
use Illuminate\Http\Request;

class NotificationsController extends Controller
{
    public function index(Request $request){

        return new NotificationsCollection($request->user()->orderedNotifications()->paginate(5));
    }


    public function markAsRead(Request $request)
    {
        $request->user()->notifications()->where('id', $request->notification)->firstOrFail()->markAsRead();


        return to_route('homefeed');
    }
}
