<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Follow;
use App\User;

use Illuminate\Http\Request;

class FollowsController extends Controller
{
    //
    public function followList(){
        return view('follows.followList');
    }

    public function followerList(){
        return view('follows.followerList');
    }



    public function follow(Request $request)
    {

        $isFollow = Auth::user()->isFollow($request->follow_id);
        if(!$isFollow)
        {
            $follow = new follow();
            $follow->following_id = Auth::user()->id;
            $follow->followed_id = $request->follow_id;
            $follow->save();
        }
        return back();
    }


    public function unfollow(Request $request)
    {
        $isFollow = Auth::user()->isFollow($request->follow_id);
        dd($isFollow);
        if($isFollow)
        {
            Follow::where('following_id', Auth::user()->id)->where('followed_id', $request->follow_id)->delete();
        }
        return back();
    }
}
