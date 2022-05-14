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

        $posts = \DB::table('posts')->select('posts.id','user_id','post','posts.updated_at','username','images')
        ->join('users','posts.user_id','=','users.id') //join(table,column,=,column)
        ->where('user_id',$user["id"])   //ログインユーザーのつぶやき取得
        ->orwhereIn('user_id',$following)   //フォローユーザーのつぶやき取得
        ->orderBy('updated_at','DESC')    //つぶやきの更新が新しい順でソート
        ->get();

        return view('posts.index',compact('user','following','followed','posts'));
    }

    public function postDelete($id){
        \DB::table('posts')
        ->where('id',$id)
        ->delete();

        return redirect('top');
    }

    public function postUpdate(Request $request){
        $id = $request->input('id');
        $up_post = $request->input('upPost');
        \DB::table('posts')
        ->where('id',$id)
        ->update(
            ['post' => $up_post]
        );

        return redirect('top');
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
