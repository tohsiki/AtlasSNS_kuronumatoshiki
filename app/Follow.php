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

}
