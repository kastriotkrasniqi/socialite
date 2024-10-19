<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Notifications\Friendship\FriendRequest;

class FriendshipController extends Controller
{
    public function send(Request $request)
    {

        $recipient = User::findOrFail($request->id);
        $sender = $request->user();

        if($sender->sendFriendRequest($recipient)){
            $recipient->notify(new FriendRequest($sender));
            return back()->with(['message' => 'Friend request sent'], 200);
        }


        return back()->with(['message' => 'Something went wrong'], 500);
    }
    public function accept(){}

    public function deny(){}

    public function remove(){}

}
