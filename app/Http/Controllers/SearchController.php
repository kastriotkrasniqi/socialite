<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $searchTerm = $request->search;

        $users_search_results = User::where('name', 'like', '%' . $searchTerm . '%')
            ->orWhereRaw("SOUNDEX(name) = SOUNDEX(?)", [$searchTerm])
            ->get();

        return UserResource::collection($users_search_results);
    }
}
