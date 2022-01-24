@extends('layouts.login')

@section('content')
<div class="container">
    <div class="post-container"> <!--class名仮置き-->
      <img src="images/icon1.png" class="prof-icon">
      {!! Form::open(['url' => 'post']) !!}
      <div class="post-form"> <!--class仮置き-->
        {!! Form::input('text','newPost',null,['required','class'=>'form-control','placeholder'=>'投稿内容を入力してください。']) !!}
        <button type="submit" class="post-button"><img src="images/post.png"></button>
      </div>
      {!! Form::close() !!}
    </div>
    <div>
        <table>
            <tr>
                <div class="">
                  <td><img src="images/icon1.png"></td>

                  <div class="">
                      <td>name</td>
                      <td>日時</td>
                    <td>内容</td>
                  </div>

                  <div class="">
                    <td><a href=""><img src="images/edit.png"></a></td>
                    <td><a href="" onclick="return confirm('この投稿を削除してよろしいですか？')"><img src="images/trash.png"></a></td>
                  </div>
                </div>
            </tr>
        </table>
    </div>
</div>

@endsection
