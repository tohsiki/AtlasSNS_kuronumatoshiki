<?php


namespace App\Http\Controllers;

use App\Post;
use App\User;
use App\Follow;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\PostRequest;

class PostsController extends Controller
{
    //追加する条件：ログインしているユーザーのid=following_idの時のfollowed_idの投稿とログインしているユーザーの投稿を引っ張ってくる。
    public function index(){
        $posts = Post::with('user')->get();
        $followed_id = Auth::user()->follows()->pluck('followed_id')->toArray();
        $login_user = Auth::user()->id;
        $followed_user = User::whereIn('id',$followed_id)->get();
        // $followed_user = User::with('post')->whereIn('id',[ $login_user,$followed_id])->get();
        // ここにログインしているユーザー
        // $followed_post = Post::with('user')->whereIn('user_id',[ $login_user,$followed_id])->get();
        $followed_post = Post::with('user')->whereIn('user_id', array_merge($followed_id, [$login_user]))->orderBy('created_at', 'desc')->get();

        return view('posts.index',['posts'=>$posts,'followed_user'=>$followed_user,'followed_post'=>$followed_post]);
    }


    public function post(Request $request){
         $request->validate([
             'post' => 'required|min:1|max:150',
        ], [
            'post.required' => '投稿内容は必須です。',
            'post.min' => '投稿内容は1文字以上で入力してください。',
            'post.max' => '投稿内容は150文字以下で入力してください.',
        ]);
        //この中に投稿の処理を作っていく。機能はログインと新規登録と似たような機能になるはず。
        if($request->isMethod('post')){
            $post = $request->input('post');
            $userId = Auth::id();
             Post::create([
                'post' => $post,
                'user_id' => $userId,
            ]);
        }
        return redirect('/top');
    }



    // 投稿を更新する処理
    // バリデーションを追加する
    public function update(Request $request)
    {
   $request->validate([
    'upPost' => 'required|min:1|max:150',
    ], [
    'upPost.required' => '投稿内容は必須です。',
    'upPost.min' => '投稿内容は1文字以上で入力してください。',
    'upPost.max' => '投稿内容は150文字以下で入力してください。',
    ]);
        // 1つ目の処理
        $id = $request->input('modal_id');

        $up_post = $request->input('upPost');
        // dd($up_post);

        // 2つ目の処理
        //whereでフォームから持ってきた$id変数の値と一致するpostsテーブルのidに紐づけられているレコードを選択する処理
        Post::where('id', $id)->update([
              'post' => $up_post
        ]);
        return redirect('/top');
    }


    public function delete($id)
    {
        Post::where('id', $id)->delete();
        return redirect('/top');
    }
}
