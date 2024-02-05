<?php


namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\PostRequest;

class PostsController extends Controller
{
    //
    public function index(){
        $posts = Post::get();
        return view('posts.index',['posts'=>$posts]);
    }

    public function post(PostRequest $request){
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
     public function update(Request $request)
    {
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
