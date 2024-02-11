<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
class Follow extends Model
{
    //試験的にコメントアウトしてる。
    protected $fillable = ['followed_id', 'following_id'];

    // // テーブル名を定義
     protected $table = 'follows';

     public function followingIds(Int $user_id)
  {
      return $this->where('following_id', $user_id)->get();
  }

//

//user_idのユーザーが、フォローしているユーザー(ID:follow_id)を抽出
//多対多のリレーション
// public function follows()
// {
//     return $this->belongsToMany(User::class, 'follows', 'user_id', 'follow_id');
// }

//     public function isFollow()
// {
//     $id = $this->id;
//     //この文でテーブルとの照らし合わせを行いtrueもしくはfalseを返す。
//     $isFollow = (boolean) Auth::user()->follows()->where('following_id', Auth::user()->id)->where('followed_id', $id)->first();
//     //  $isFollow = (boolean) Auth::user()->follows()->where('follow_id',$id)->first();
//     // (boolean) Follow::where('following_id', Auth::user()->id)->where('followed_id', $id)->first();
//     //
//     return $isFollow;
// }

}
