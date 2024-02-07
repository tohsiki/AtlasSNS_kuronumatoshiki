<?php

namespace App\Http\Controllers;
use App\User;
use App\Follow;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
    //ユーザー検索用の処理
    public function search(Request $request){
        $keyword = $request->input('keyword');

        if(!empty($keyword)){
            $users = User::where('username','like','%'.$keyword.'%')->get();
            $search = "検索ワード：" . $keyword;

        }else{
            $users = User::all();
            $search ="";
        }
        //  $users = User::get();
         return view('users.search',['users'=>$users , 'search'=>$search,]);
    }


    // プロフィール用の処理
    public function upProfile($id)
    {
        $user = User::where('id', $id)->first();
        return view('users.profile', ['user'=>$user]);
    }

    public function profile(Request $request)
    {
        // 1つ目の処理
        $id = $request->input('id');
        $up_name = $request->input('upName');
        $up_mail = $request->input('upMail');
        $up_bio = $request->input('upBio');

        // 2つ目の処理
        //whereでフォームから持ってきた$id変数の値と一致するusersテーブルのidに紐づけられているレコードを選択する処理
        User::where('id', $id)->update([
            //上記のwhereで選択したidと一致するのname、mail、bioカラムの値を最後に書いてある「->update();」で、フォームから持ってきた変数の値にそれぞれ更新している。
              'username' => $up_name,
              'mail' => $up_mail,
              'bio' => $up_bio
        ]);

        // 3つ目の処理
        //profileリンクのページに戻る記述
        return redirect('/profiles');
    }
}
