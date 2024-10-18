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
        $user = $request->user();
        $suggestedPeople = $request->user()->notFriendsWith();
        $posts = PostResource::collection(Post::withCount('likes', 'comments')->latest()->paginate(5));


        return Inertia::render('Timeline/Timeline',[
            'posts' => $posts,
            'suggestedPeople' => $suggestedPeople,
        ]);
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
