<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });
// Route::get('/home', 'HomeController@index')->name('home');

//Auth::routes();

//use Illuminate\Routing\Route;
//ログアウト中のページ
//名前付きルーティングとは

use App\Http\Controllers\FollowsController;

Route::get('/login', 'Auth\LoginController@login')->name('login');
Route::post('/login', 'Auth\LoginController@login')->name('login');

Route::get('/register', 'Auth\RegisterController@open')->name('register');
Route::post('/register', 'Auth\RegisterController@register')->name('register');

Route::get('/added', 'Auth\RegisterController@added');
Route::post('/added', 'Auth\RegisterController@added');


//getとpostの二つを書いたら解決できたよ。

//ログイン中のページ
Route::group(['middleware' => 'auth'], function() {
Route::get('/top','PostsController@index');
Route::post('/top','PostsController@index');

Route::post('/like/post/{id}', 'PostsController@postLike')->name('post.like');
Route::post('/unlike/post/{id}', 'PostsController@postUnLike')->name('post.unlike');

// ログインしているユーザーのプロフィール
Route::get('/profile','UsersController@profile');
// Route::post('/profiles','UsersController@profile');
Route::post('/profile/update', 'UsersController@upProfile');

// 他ユーザーのプロフィールに飛ぶルーティング
Route::get('/user/profile/{id}','UsersController@userProfile');

//メソッドをindex→searchに変更
Route::get('/search','UsersController@search');
Route::post('/search','UsersController@search');


Route::get('/follow-list','FollowsController@followList');
Route::get('/follower-list','FollowsController@followerList');

//投稿を処理するRouteを作る
Route::get('/post','PostsController@post');
Route::post('/post','PostsController@post');

// 投稿を編集するRoute
Route::post('/posts/update','PostsController@update');


// 投稿を削除するルーティング
Route::get('/posts/{id}/delete','PostsController@delete');

//ログアウトのURLを追加した。
Route::get('/logout', 'Auth\LoginController@logout');

// フォロー用のルーティングは以下にまとめる。
// フォロー用のルーティング
Route::post('/follow', 'FollowsController@follow')->name('follow');

// フォロー解除用のルーティング
Route::post('/unfollow', 'FollowsController@unfollow')->name('unfollow');

Route::namespace('BulletinBoard')->group(function(){
      Route::post('/comment/create', 'PostsController@commentCreate')->name('comment.create');
      Route::post('/like/post/{id}', 'PostsController@postLike')->name('post.like');
      Route::post('/unlike/post/{id}', 'PostsController@postUnLike')->name('post.unlike');
  });
});
