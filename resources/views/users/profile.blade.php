@extends('layouts.login')

@section('content')

@if($target_id == $user->id)
<!-- ========================================================================================== -->
<!-- =============   ログインユーザーのプロフィールページの場合    =================================-->
<!-- ========================================================================================== -->
    <div class="error-message">
    @foreach ($errors->all() as $error)
        <li>{{$error}}</li>
    @endforeach
    </div>
    <div class="prof-container">
    <img src="{{'/storage/images/'.$user['images']}}" class="prof-icon">
        <table class="prof-list">
            <tr>
                <div class="prof-item">
                    <p>user name</p>
                    {!! Form::open(['url' => '/profile/update' , 'files' => true]) !!}
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
                     {{Form::password('password', ['class' => 'prof-form','placeholder' => '英字のみ 8文字以上20文字以内','rows'=>1,'minlength'=>8,'maxlength'=>20])}}
                </div>
            </tr>
            <tr>
                <div class="prof-item">
                    <p>password confirm</p>
                    {{Form::password('password_confirmation', ['class' => 'prof-form','placeholder' => 'パスワードを再入力してください。','rows'=>1,'minlength'=>8,'maxlength'=>20])}}
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
                    <input type='file' name='image' class='custom-file-input' id=fileImage accept='image/jpg,image/png,image/bmp,image/gif,image/svg'>
                </div>
            </tr>
        </table>
        <button type="submit" class="text-button red-button prof-submit" onclick="return confirm('この内容で更新してよろしいですか？')">更新</button>
        {!! Form::close() !!}
    </div>

@else
<!-- ========================================================================================== -->
<!-- =================   他ユーザーのプロフィールページの場合    ===================================-->
<!-- ========================================================================================== -->

<div class="container">
  <!-- -------------------------------------------------------------------------------------------------------------------------------------------------------------------- -->
  <!--         top content -->
    <div class="post-container"> <!--class名仮置き-->
        <div class="prof-container-other">
            <img class="prof-icon prof-page-icon" src="/storage/images/{{$target_user->images}}"><!-- img仮置き -->
            <div class="prof-label">
                <p class="prof-label-name">name</p>
                <p class="prof-label-name">bio</p>
            </div>
            <div class="prof-text-area">
                <p>{{$target_user->username}}</p>
                <p>{{$target_user->bio}}</p>
            </div>
                @if(in_array($target_id,$follows))
                    <form action="/f_cancel_user" method="get">
                    {!! Form::hidden('from', "/profile") !!}
                    <button type="submit" id="f_cancel_user" name="f_cancel_user" class="text-button  red2-button" value="{{$target_id}}" onclick="return confirm('フォローを解除してよろしいですか？')">フォロー解除</button>
                @else
                    <form action="/f_user" method="get">
                    {!! Form::hidden('from', "/profile") !!}
                    <button type="submit" id="f_user" name="f_user" class="text-button skyblue-button" value="{{$target_id}}">フォローする</button>
                @endif
            </form>
        </div>
    </div>
    <!-- ----------------------------------------------------------------------------------------------------------------------------------------------------------------- -->
    <!-- post table -->
    <div class="post-list">
      <ul>
        @foreach($posts as $post)
        <li class="post-block">
          <div class="post-list-left-space"></div>
              <figure><img src="/storage/images/{{$post->images}}" class="icon">
              </figure>

              <div class="post-content">
                <div>
                  <!-- <td>id:{{$post->id}} </td> -->
                  <!-- <td>user_id:{{$post->user_id}} </td> -->
                  <div class="post-name">{{$post->username}}さん</div>
                  <div class="post-time">{{$post->updated_at}}</div>
                </div>
                <div class="post-post">
                  <p class="post">{{$post->post}}</p>
                </div>
              </div>


        </li>
        @endforeach
    </div>
</div>
@endif


@endsection