<?php

namespace App\Http\Controllers;

use App\Models\Relation;
use App\Models\User;
use Illuminate\Http\Request;

class RelationController extends Controller
{
    public function thumb(Request $request){
        $relation = new Relation();

        $relation->user_id = $request->user_id;
        $relation->liked_id = $request->liked_id;
        $relation->save();

        return redirect('/home');
    }

    public function match(){
        $userId = auth()->user()->id;

        // Get the relations where the current user is the liker and like_status is true
        $myLikes = Relation::where('user_id', $userId)
                        ->pluck('liked_id');

        // Get the relations where the current user is liked and like_status is true
        $likedMe = Relation::where('liked_id', $userId)
                        ->pluck('user_id');

        // Get the users who have liked each other (matching users)
        $matchingUserIds = $myLikes->intersect($likedMe);

        // Get the User objects for the matching users
        $listLikes = User::whereIn('id', $matchingUserIds)->get();

        return view('match', compact('listLikes'));
    }
}
