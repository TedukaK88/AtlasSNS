@extends('layouts.logout')

@section('content')

{!! Form::open() !!}

<h3>AtlasSNSへようこそ</h3>

<div class="form">
    {{ Form::label('mail address') }}
    <br>
    {{ Form::text('mail',null,['class' => 'input']) }}
</div>
<div class="form">
    {{ Form::label('password') }}
    <br>
    {{ Form::password('password',['class' => 'input']) }}
</div>
<div class="button">
    {{ Form::submit('LOGIN',['class'=>'text-button']) }}
</div>

<p class="new"><a href="/register">新規ユーザーの方はこちら</a></p>

{!! Form::close() !!}

@endsection