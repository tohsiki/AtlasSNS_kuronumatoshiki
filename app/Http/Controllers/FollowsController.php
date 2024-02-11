<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Follow;
use App\User;
use App\Post;

use Illuminate\Http\Request;

class FollowsController extends Controller
{
    //
    public function followList()
    {
    //追加する条件：ログインしているユーザーのid=following_idの時のfollowed_idを引っ張る。
    //①
        $followed_id = Auth::user()->follows()->pluck('followed_id');
        $followed_user = User::whereIn('id',$followed_id)->get();
        $followed_post = Post::with('user')->whereIn('user_id',$followed_id)->get();
        // dd($followed_id,$followed_user,$followed_post);

        return view('follows.followlist',['followed_user'=>$followed_user,'followed_post'=>$followed_post]);
    }

    public function followerList(){
        //条件：ログインしているユーザーをフォローしているユーザーの情報を取得する。
        $follower_id = Auth::user()->follower()->pluck('following_id');
        $follower_user = User::whereIn('id',$follower_id)->get();
        $follower_post = Post::with('user')->whereIn('user_id',$follower_id)->get();
        // dd($follower_id,$follower_user,$follower_post);
        // $follow_list = Follow::with('user')->where('following_id', Auth::user()->id)->pluck('followed_id');
        return view('follows.followerList',['follower_user'=>$follower_user,'follower_post'=>$follower_post]);
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
        // dd($isFollow);
        if($isFollow)
        {
            Follow::where('following_id', Auth::user()->id)->where('followed_id', $request->follow_id)->delete();
        }
        return back();
    }
}
