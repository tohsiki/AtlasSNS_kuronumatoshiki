<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Like;
use Auth;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'mail', 'password',
    ];
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function post()
    {
        return $this ->hasMany('App\Post');
        return $this ->belongsTo('App\Post');
    }
    //  public function posts()
    // {
    //     return $this ->belongsTo('App\Post');
    // }

    // フォロー機能用　ここを
    // フォロワー→フォロー
    // フォローリストの表示でも使う。
    public function follows()
    {
        // userテーブルのidに別の名前をつけたい。
        return $this->belongsToMany('App\User', 'follows', 'following_id','followed_id');
    }

    // フォロー→フォロワー
    public function follower()
    {
        return $this->belongsToMany('App\User', 'follows', 'followed_id','following_id');
        // return $this->belongsToMany('App\User', 'follows', 'following_id','followed_id');
    }

    public function isFollow(int $user_id)
{
    //この文でテーブルとの照らし合わせを行いtrueもしくはfalseを返す
    // return (boolean) $this->follows()->where('followed_id', $user_id)->first();
     return (bool) $this->follows()->where('followed_id', $user_id)->exists();
    //  $isFollow = (boolean) Auth::user()->follows()->where('follow_id',$id)->first();
    // (boolean) Follow::where('following_id', Auth::user()->id)->where('followed_id', $id)->first();
}

 // いいねしているかどうか
    public function is_Like($post_id){
        return Like::where('like_user_id', Auth::id())->where('like_post_id', $post_id)->first(['likes.id']);
    }

    public function likePostId(){
        return Like::where('like_user_id', Auth::id());
    }

}
