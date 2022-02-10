<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostsController extends Controller
{
    // //register
    // public function register(){
    //     return view('auth.register');
    // }

    //home
    public function home(){
        return view('auth.login');
    }

    public function index(){
        $user = auth()->user();
        $following = \DB::table('follows')->select('following_id')->where('followed_id',$user["id"])->pluck('following_id');
        $followed = \DB::table('follows')->select('followed_id')->where('following_id',$user["id"])->pluck('followed_id');
        return view('posts.index',compact('user','following','followed'));
    }


    public function followList(){
        $user = auth()->user();
        return view('posts.follow-list',['user'=>$user]);
    }


    public function followerList(){
        $user = auth()->user();
        return view('posts.follower-list',['user'=>$user]);
    }

    //post　新規登録処理
    public function postCreate(Request $request){
        $user_id = auth()->id();
        // $user_id = 1;  //ユーザーID機能未実装につき仮ID設定中
        $post = $request->input('newPost');
        \DB::table('posts')->insert([
            'user_id' => $user_id,  //現在仮ID登録中。ログインユーザーのIDを取得し代入すること。
            'post' => $post
        ]);

        return redirect('top');
    }

    // public function postCreate(){
    //     return view('post.index');
    // }

}
