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
        $keyword = array("none");
        // $follows = \DB::table('follows')->where('followed_id',$user["id"])->get(); フォローボタンの表示非表示の為のDB取得を考え中。。。

        return view('users.search',['user'=>$user],['users'=>$users],['follows'=>$follows])->with('keyword','none');
    }

    public function search_result(Request $request){
        $keyword = $request->input('keyword'); //検索ワードの取得
        $user = auth()->user(); //ログイン中のユーザー取得
        $users = \DB::table('users') //table指定
        ->where('id','<>',$user["id"]) //ログイン中のユーザー以外
        ->where('username','like',"%$keyword%") //検索ワードあいまい検索
        ->get();

        return view('users.search',['user'=>$user],['users'=>$users])->with('keyword',$keyword);
    }

    //ユーザーのフォロー処理
    public function f_user (Request $request){
        $f_user = $request->input('f_user');
        $user = auth()->user(); //ログイン中のユーザー取得
        \DB::table('follows')->insert([
            'following_id' => $user["id"],
            'followed_id' => $f_user
        ]);
        $users = \DB::table('users')->where('id','<>',$user["id"])->get(); //ログイン中のユーザー以外のユーザー取得

        return view('users.search',['user'=>$user],['users'=>$users]);
    }
        //ユーザーのフォロー解除処理
        public function f_cancel_user (Request $request){
            $f_cancel_user = $request->input('f_cancel_user');
            $user = auth()->user(); //ログイン中のユーザー取得
            \DB::table('follows')->where([
                'following_id' => $user["id"],
                'followed_id' => $f_cancel_user
            ])->delete();
            $users = \DB::table('users')->where('id','<>',$user["id"])->get(); //ログイン中のユーザー以外のユーザー取得

            return view('users.search',['user'=>$user],['users'=>$users]);
        }


    //logout
    public function getLogout(){
        Auth::logout();
        return redirect()->view('login');
    }
}
