@extends('layouts.login')

@section('content')
@foreach ($errors->all() as $error)
  <li>{{$error}}</li>
@endforeach
<div class="prof-container">
  <img src="images/icon1.png" class="prof-icon">
      <table class="prof-list">
            <tr>
                <div class="prof-item">
                <p>user name</p>
                {!! Form::open(['url' => '/profile/update']) !!}
                {!! Form::hidden('id', "{$user->id}") !!}
                {!! Form::textarea('username',"{$user->username}",['required','class'=>'prof-form','placeholder'=>'名前を入力してください。','rows'=>1,'minlength'=>2,'maxlength'=>12]) !!}
                </div>
            </tr>
            <tr>
                <div class="prof-item">
                    <p>mail address</p>
                        {!! Form::textarea('mail',"{$user->mail}",['required','class'=>'prof-form','placeholder'=>'メールアドレスを入力してください。','rows'=>1,'minlength'=>5,'maxlength'=>40]) !!}
                    </div>
                </tr>
                <tr>
                    <div class="prof-item">
                    <p>password</p>
                    {!! Form::textarea('password',"",['required','class'=>'prof-form','placeholder'=>'英字のみ 8文字以上20文字以内','rows'=>1,'minlength'=>8,'maxlength'=>20]) !!}
                    </div>
                </tr>
                <tr>
                    <div class="prof-item">
                        <p>password confirm</p>
                        {!! Form::textarea('password_confirmation',"",['required','class'=>'prof-form','placeholder'=>'パスワードを再入力してください。','rows'=>1,'minlength'=>8,'maxlength'=>20]) !!}
                    </div>
                </tr>
                <tr>
                <div class="prof-item">
                    <p>bio</p>
                    {!! Form::textarea('bio',"{$user->bio}",['class'=>'prof-form','placeholder'=>'150文字以内で入力してください。','rows'=>1,'minlength'=>1,'maxlength'=>150]) !!}
                    </div>
                </tr>
                <tr>
                <div class="prof-item">
                    <p>icon image</p>
                    {{Form::file('image', ['class'=>'custom-file-input','id'=>'fileImage'])}}
                    </div>
                </tr>
        </table>
        <button type="submit" class="text-button prof-submit" onclick="return confirm('この内容で更新してよろしいですか？')">更新</button>
        {!! Form::close() !!}
</div>



@endsection