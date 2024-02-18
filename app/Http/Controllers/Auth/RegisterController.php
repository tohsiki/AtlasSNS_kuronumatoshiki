<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use App\Http\Requests\RegisterFormRequest;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    //新規登録画面を表示させる用
    public function open(){
     return view('auth.register');
    }

    //登録する処理
    public function register(Request $request){
         $request->validate([
            'username' => 'required|unique:users,username|min:2|max:12',
            'mail' =>  'required|unique:users,mail|email|min:5|max:40',
            'password' => 'required|alpha_num|min:8|max:20',
            'password_confirmation' => 'required|alpha_num|min:8|max:20|same:password',
        ],[
            'username.required' => 'ユーザー名は必須です。',
            'username.unique' => 'そのユーザー名は既に使用されています。',
            'username.min' => 'ユーザー名は2文字以上で入力してください。',
            'username.max' => 'ユーザー名は12文字以下で入力してください。',
            'mail.required' => 'メールアドレスは必須です。',
            'mail.unique' => 'そのメールアドレスは既に使用されています。',
            'mail.email' => '有効なメールアドレスを入力してください。',
            'mail.min' => 'メールアドレスは5文字以上で入力してください。',
            'mail.max' => 'メールアドレスは40文字以下で入力してください。',
            'password.required' => 'パスワードは必須です。',
            'password.alpha_num' => 'パスワードは英数字で入力してください。',
            'password.min' => 'パスワードは8文字以上で入力してください。',
            'password.max' => 'パスワードは20文字以下で入力してください。',
            'password_confirmation.required' => '確認用パスワードは必須です。',
            'password_confirmation.alpha_num' => '確認用パスワードは英数字で入力してください。',
            'password_confirmation.min' => '確認用パスワードは8文字以上で入力してください。',
            'password_confirmation.max' => '確認用パスワードは20文字以下で入力してください。',
            'password_confirmation.same' => '確認用パスワードが一致しません。',
        ]);
        if($request->isMethod('post')){
            $username = $request->input('username');
            $mail = $request->input('mail');
            $password = $request->input('password');
            //セッションの記述
            $name = request()->input('username');
            request()->session()->put('username', $name);
            User::create([
                'username' => $username,
                'mail' => $mail,
                'password' => bcrypt($password),
            ]);

            return redirect('added');
        }
        return view('auth.register');
    }

    public function added(){
        return view('auth.added');
    }
}
