<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UsersController extends Controller
{
    //
    public function profile(){
        $user = auth()->user();
        return view('users.profile',['user'=>$user]);
    }
    public function search(){
        $user = auth()->user(); //ログイン中のユーザー取得
        $users = \DB::table('users')->where('id','<>',$user["id"])->get(); //ログイン中のユーザー以外のユーザー取得

        return view('users.search',['user'=>$user],['users'=>$users]);
    }

    //logout
    public function getLogout(){
        Auth::logout();
        return redirect()->view('login');
    }
}
