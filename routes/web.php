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


// // 投稿の削除
// Route::get('/post/delete/{id}', 'PostsController@delete')->name('post.delete');

Route::post('/profile','UsersController@profile');
Route::get('/profile','UsersController@profile');


//メソッドをindex→searchに変更
Route::get('/search','UsersController@search');
Route::post('/search','UsersController@search');


Route::get('/follow-list','PostsController@index');
Route::get('/follower-list','PostsController@index');

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

});
