<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;

class UsersController extends Controller
{
    //=============================================================================================================================
    //          プロフィール関連
    //=============================================================================================================================
    //  プロフィール編集view
    public function profile($id){
        $user = auth()->user();
        $following = \DB::table('follows')->select('following_id')->where('followed_id',$user["id"])->pluck('following_id');
        $followed = \DB::table('follows')->select('followed_id')->where('following_id',$user["id"])->pluck('followed_id');
        $follows = $following->toArray();
        $target_id = $id;
        $target_user = \DB::table('users')->select()->where('id',$target_id)->first();

        if($target_id <> $user->id){
            $posts = \DB::table('posts')->select('posts.id','user_id','post','posts.updated_at','username','images')
            ->join('users','posts.user_id','=','users.id') //join(table,column,=,column)
            ->where('user_id',$target_id)   //targetユーザーのつぶやき取得
            ->orderBy('updated_at','DESC')    //つぶやきの更新が新しい順でソート
            ->get();
        }else{
            $posts = 'none';
        }

        return view('users.profile',compact("user",'following','followed','follows','target_id','target_user','posts'));
    }

    //-------------------------------------------------------------------------
    //   プロフィール更新
    public function prof_update(Request $request){
        $user_id = $request->id;
        //validate
        $rules = [
            'username' => 'required|string|min:2|max:255',
            'mail' => 'required|string|email|min:5|max:255|unique:users,mail,'.$request->id.',id',  // unique:Table,Column,除外したいRecordのキー,除外したいRecordのColumn
            'password' => ['string' , 'regex:/\A([a-zA-Z0-9]{8,20})+\z/u' , 'confirmed'],
            'bio' => 'max:150',
            'image' => 'mimes:jpg,jpeg,png,bmp,gif,svg'
        ];
        $validator = Validator::make($request->all(),$rules);
        //フォーム入力に問題がある場合
        if($validator->fails()){
            // dd($request);
            return redirect('/profile/'.$user_id)
            ->withErrors($validator) // Validatorインスタンスの値を$errorsへ保存
            ->withInput(); // 送信されたフォームの値をInput::old()へ引き継ぐ
        //-------------------------------------------------------------------------
        }else{
        //フォーム入力に問題がない場合　 updateの為に$requestから変数へ分解&ReName
        $id = $request->input('id');
        $username = $request->input('username');
        $mail = $request->input('mail');
        $password = bcrypt($request['password']);
        $bio = $request->input('bio');
        //-------------------------------------------------------------------------
        //image 処理とアップデート処理
        if(request('image')){
        //image がアップされた場合のバリデーション処理
            // dd($request);
            //ファイル名を取得　→　preg_matchで半角英数字か判別　→　DBをupdate or 元のページに戻す
            $image_name=request()->file('image')->getClientOriginalName();
            if(preg_match('/^[a-zA-Z0-9]+....$/',$image_name)){
                request()->file('image')->move('storage/images',$image_name);
                \DB::table('users')
                ->where('id',$id)
                ->update(
                    ['images'=>$image_name]
                );
            }else{
                return redirect('/profile/'.$user_id)
                ->withErrors('プロフィール画像のファイル名は英数字のみにしてください。') // Validatorインスタンスの値を$errorsへ保存
                ->withInput(); // 送信されたフォームの値をInput::old()へ引き継ぐ
            }
        }
        //共通のDBアップデート処理
        \DB::table('users')
        ->where('id',$id)
        ->update(
            ['username' => $username,'mail' => $mail,'password' => $password,'bio' => $bio]
        );
        //-------------------------------------------------------------------------
        return redirect('/post/index');
        }
    }
    //=============================================================================================================================


    //=============================================================================================================================
    //          ユーザー検索関連
    //=============================================================================================================================
    //  ユーザー検索view
    public function search(){
        $user = auth()->user();
        $following = \DB::table('follows')->select('following_id')->where('followed_id',$user["id"])->pluck('following_id');
        $followed = \DB::table('follows')->select('followed_id')->where('following_id',$user["id"])->pluck('followed_id');
        $users = \DB::table('users')->where('id','<>',$user["id"])->get(); //ログイン中のユーザー以外のユーザー取得
        $follows = $following->toArray();

        return view('users.search',compact("user",'following','followed',"users","follows"));
    }
    //-------------------------------------------------------------------------
    //  ユーザー検索結果view
    public function search_result(Request $request){
        $keyword = $request->input('keyword'); //検索ワードの取得
        $user = auth()->user();
        $following = \DB::table('follows')->select('following_id')->where('followed_id',$user["id"])->pluck('following_id');
        $followed = \DB::table('follows')->select('followed_id')->where('following_id',$user["id"])->pluck('followed_id');
        $users = \DB::table('users') //table指定
        ->where('id','<>',$user["id"]) //ログイン中のユーザー以外
        ->where('username','like',"%$keyword%") //検索ワードあいまい検索
        ->get();
        $follows = $following->toArray();

        return view('users.search',compact("user",'following','followed',"users","follows"))->with('keyword',$keyword);
    }

    //-------------------------------------------------------------------------
            //ユーザーのフォロー処理
            public function f_user (Request $request){
                $f_user = $request->input('f_user');
                $user = auth()->user(); //ログイン中のユーザー取得
                \DB::table('follows')->insert([
                    'following_id' => $f_user,
                    'followed_id' => $user["id"]
                ]);

                $from = $request->from;     //どのページからのリクエストか識別し、redirect先に指定する
                if($from == "/profile"){
                    return redirect($from."/".$f_user);
                }else{
                    return redirect($from);
                }
            }
            //ユーザーのフォロー解除処理
            public function f_cancel_user (Request $request){
                $f_cancel_user = $request->input('f_cancel_user');
                $user = auth()->user(); //ログイン中のユーザー取得
                \DB::table('follows')->where([
                    'following_id' => $f_cancel_user,
                    'followed_id' => $user["id"]
                ])->delete();

                $from = $request->from;     //どのページからのリクエストか識別し、redirect先に指定する
                if($from == "/profile"){
                    return redirect($from."/".$f_cancel_user);
                }else{
                    return redirect($from);
                }
            }
    //=============================================================================================================================



    //logout
    public function getLogout(){
        Auth::logout();
        return redirect()->view('login');
    }
}
