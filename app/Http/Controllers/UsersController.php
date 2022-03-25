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
        $user = auth()->user();
        $following = \DB::table('follows')->select('following_id')->where('followed_id',$user["id"])->pluck('following_id');
        $followed = \DB::table('follows')->select('followed_id')->where('following_id',$user["id"])->pluck('followed_id');
        $users = \DB::table('users')->where('id','<>',$user["id"])->get(); //ログイン中のユーザー以外のユーザー取得
        $follows = \DB::table('follows')->select('following_id')->where('followed_id',$user["id"])->get();

        return view('users.search',compact("user",'following','followed',"users","follows"));
    }

    public function search_result(Request $request){
        $keyword = $request->input('keyword'); //検索ワードの取得
        $user = auth()->user();
        $following = \DB::table('follows')->select('following_id')->where('followed_id',$user["id"])->pluck('following_id');
        $followed = \DB::table('follows')->select('followed_id')->where('following_id',$user["id"])->pluck('followed_id');
        $users = \DB::table('users') //table指定
        ->where('id','<>',$user["id"]) //ログイン中のユーザー以外
        ->where('username','like',"%$keyword%") //検索ワードあいまい検索
        ->get();
        $follows = \DB::table('follows')->where('followed_id',$user["id"])->get();

        return view('users.search',compact("user",'following','followed',"users","follows"))->with('keyword',$keyword);
    }

    //ユーザーのフォロー処理
    public function f_user (Request $request){
        $f_user = $request->input('f_user');
        $user = auth()->user(); //ログイン中のユーザー取得
        \DB::table('follows')->insert([
            'following_id' => $f_user,
            'followed_id' => $user["id"]
        ]);
        return redirect('search');
    }
        //ユーザーのフォロー解除処理
        public function f_cancel_user (Request $request){
            $f_cancel_user = $request->input('f_cancel_user');
            $user = auth()->user(); //ログイン中のユーザー取得
            \DB::table('follows')->where([
                'following_id' => $f_cancel_user,
                'followed_id' => $user["id"]
            ])->delete();
            return redirect('search');
        }


    //logout
    public function getLogout(){
        Auth::logout();
        return redirect()->view('login');
    }
}
