<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\Post as Authenticatable;

class Post extends Model
{
    protected $fillable = ['user_id', 'post']; //
    // ユーザーとのリレーションを定義するメソッド
    public function user()
    {
        return $this->belongsTo('App\User');
        return $this->hasMany('App\User');
    }

    public function follows()
    {
    //多対多のリレーション設定
        return $this->belongsToMany('App\User','follows','following_id','followed_id');
    }


    // コメント機能用
    public function postComments(){
        return $this->hasMany('App\PostComment');
    }

     // コメント数
    public function commentCounts($post_id){
        return Post::with('postComments')->find($post_id)->postComments();
    }
}
