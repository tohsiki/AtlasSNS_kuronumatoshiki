<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Follow;

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
        $follow_id = $request->follow_id;
        //ログインユーザーが対象のユーザーをフォローしているか？この記述をうまくモデルに当てはめる。→関数を準備する→関数が完成したらコントローラで完成した関数を呼び出す。
        // モデルが関わっているフォロー機能の参考サイトを探す。
        // アウトプット練習で聞かれるところ。
        $follow = new Follow;
        $isFollow = $follow->isFollow();
    if($isFollow){
        $unfollow = Follow::where('following_id', Auth::user()->id)->where('followed_id', $follow_id);
        $unfollow->delete();
    }else{
        $follow = new follow();
        $follow->following_id = Auth::user()->id;
        $follow->followed_id = $follow_id;
        $follow->save();
    }

    return back();

}
}
