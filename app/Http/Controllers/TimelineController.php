<?php

namespace App\Http\Controllers;

use App\Http\Resources\PostResource;
use App\Models\Post;
use App\Models\User;
use Inertia\Inertia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Notifications\Friendship\FriendRequest;

class TimelineController extends Controller
{
    public function index(Request $request){
        $suggestedPeople = $request->user()->notFriendsWith();
        $posts = PostResource::collection($request->user()->posts()->latest()->paginate(5));


        return Inertia::render('Timeline/Timeline',compact('suggestedPeople','posts'));
    }


    public function sendFriendRequest(Request $request)
    {

        $recipient = User::find($request->user);
        $sender = $request->user();

        if($sender->sendFriendRequest($recipient)){
            $recipient->notify(new FriendRequest($sender));
        }


        return to_route('timeline');
    }
}
