<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Notifications\Friendship\FriendRequest;

class FriendshipController extends Controller
{
    public function accept(){}

    public function deny(){}

    public function remove(){}


    public function send(Request $request)
    {

        $recipient = User::find($request->id);
        $sender = $request->user();

        if($sender->sendFriendRequest($recipient)){
            $recipient->notify(new FriendRequest($sender));
        }


        return back();
    }
}
