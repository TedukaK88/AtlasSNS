@extends('layouts.logout')

@section('content')

{!! Form::open() !!}

<h3>新規ユーザー登録</h3>
<div class="form">
    {{ Form::label('user name') }}
    {{ Form::text('username',null,['class' => 'input']) }}
</div>
<div class="form">
    {{ Form::label('mail address') }}
    {{ Form::text('mail',null,['class' => 'input']) }}
</div>
<div class="form">
    {{ Form::label('password') }}
    {{ Form::text('password',null,['class' => 'input']) }}
</div>
<div class="form">
    {{ Form::label('password confirm') }}
    {{ Form::text('password_confirmation',null,['class' => 'input']) }}
</div>
<div class="button">
{{ Form::submit('REGISTER',['class'=>'text-button']) }}
</div>

<p class="back"><a href="/login">ログイン画面へ戻る</a></p>

{!! Form::close() !!}


@endsection
