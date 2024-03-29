<?php

namespace App\Http\Controllers;
use App\User;
use App\Post;
use App\Follow;
use Illuminate\Http\Request;
use App\Http\Requests\ProfileUpdateRequest;
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
    public function profile()
    {
        $user = Auth::user();
        return view('users.profile', ['user'=>$user]);
    }
    // コントローラにバリデーション入れるか迷い中。
    public function upProfile(Request $request)
{
    $request->validate([
    'upName' => 'required|min:2|max:12',
    'upMail' => 'required|email|min:5|max:40|unique:users,mail,'.$request->id.',id',
    'newPass' => 'required|alpha_num|min:8|max:20',
    'newPassCon' => 'required|alpha_num|min:8|max:20|same:newPass',
    'upBio' => 'max:150',
    'newIcon' => 'image|mimes:jpg,png,bmp,gif,svg',
], [
    'upName.required' => '名前は必須です。',
    'upName.min' => '名前は2文字以上で入力してください。',
    'upName.max' => '名前は12文字以下で入力してください。',
    'upMail.required' => 'メールアドレスは必須です。',
    'upMail.email' => '有効なメールアドレスを入力してください。',
    'upMail.min' => 'メールアドレスは5文字以上で入力してください。',
    'upMail.max' => 'メールアドレスは40文字以下で入力してください。',
    'upMail.unique' => 'そのメールアドレスは既に使用されています。',
    'newPass.required' => 'パスワードは必須です。',
    'newPass.alpha_num' => 'パスワードは英数字で入力してください。',
    'newPass.min' => 'パスワードは8文字以上で入力してください。',
    'newPass.max' => 'パスワードは20文字以下で入力してください。',
    'newPassCon.required' => '確認用パスワードは必須です。',
    'newPassCon.alpha_num' => '確認用パスワードは英数字で入力してください。',
    'newPassCon.min' => '確認用パスワードは8文字以上で入力してください。',
    'newPassCon.max' => '確認用パスワードは20文字以下で入力してください。',
    'newPassCon.same' => '確認用パスワードが一致しません。',
    'upBio.max' => '自己紹介は150文字以下で入力してください。',
    'newIcon.image' => '画像ファイルを選抨してください。',
    'newIcon.mimes' => '画像ファイルはjpg、png、bmp、gif、svg形式でアップロードしてください。',
]);
    // 1つ目の処理
    $id = $request->input('id');
    $up_name = $request->input('upName');
    $up_mail = $request->input('upMail');
    $up_bio = $request->input('upBio');
    $new_pass = $request->input('newPass');
    $new_passCon = $request->input('newPassCon');
    $new_icon = null; // Initialize $new_icon to null
    if ($request->hasFile('newIcon')) {
        $new_icon = $request->file('newIcon')->store('public/images');
    }
    // 2つ目の処理
    $updateData = [
        'username' => $up_name,
        'mail' => $up_mail,
        'bio' => $up_bio,
        'password' => bcrypt($new_pass),
    ];
    if ($new_icon !== null) {
        $updateData['images'] = basename($new_icon);
    }
    User::where('id', $id)->update($updateData);
    // 3つ目の処理
    return redirect('/top');
}



//他ユーザーのプロフィールを処理する用
//押されたアイコンのユーザーのidを取得して、viewファイルに返す処理
    public function userProfile($id)
    {
        $user_profile = User::where('id', $id)->first();
        // dd($user_profile);
      $profiles = Post::where('user_id', $id)->orderBy('created_at', 'desc')->get();
        // dd($profiles);
        return view('users.userprofile',['profiles'=>$profiles ,'user_profile'=>$user_profile]);
    }


}
