<?php

namespace App\Http\Controllers;
use App\User;
use App\Follow;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
    //
    public function profile(){
        return view('users.profile');
    }



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
}
