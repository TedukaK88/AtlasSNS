<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator; //Validator ファザードを使用する、らしい

class FormController extends Controller
{
    //
    public function postValidates(Request $request){
        $validator = Validator::make($request->all(),[
            'username' => 'required | min:2 | max:12',
            'mail' => 'required | min:5 | max:40',
            'password' => 'required | min:8 | max:20 | confirmed',
            'password-confirm' => 'required | same:password',
            'bio' => 'max:150',
        ]);
        //-----------------------記述方法：Validator::make('値の配列' => '検証ルールの配列);
                                    // required：何かしらの値があること
                                    // integer：半角整数であること
                                    // between:a,b：aからbまでの数字
                                    // max:a：文字数の最大値がa個
                                    // regex:：PHPのpreg_match関数

        if($validator->fails()){
            return redirect('/profile')
            ->withErrors($validator) // Validatorインスタンスの値を$errorsへ保存
            ->withInput(); // 送信されたフォームの値をInput::old()へ引き継ぐ
        }else{
            return view('/profile');
        }
        //-----------------------記述方法：if($validator->fails()){失敗時の処理}else{成功時の処理}
    }
}
