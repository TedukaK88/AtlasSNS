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
        @foreach($posts as $post)
            <tr>
                <div class="post-table">
                  <td><img src="images/icon1.png">

                  <div class="">
                      <td>id:{{$post->id}} </td><!-- 検証用 postID確認 -->
                      <td>user_id:{{$post->user_id}} </td><!-- 検証用 -->
                      <td>{{$post->username}}</td>
                      <td>{{$post->updated_at}}</td>
                  </div>
                  </td>

                  <td>{{$post->post}}</td>

                  @if($post->user_id === $user->id) <!-- post本人かチェック ※$user　は Controller で ログインユーザー１人のみの配列 として作成してある-->
                  <div class="">
                    <td><a href=""><img src="images/edit.png"></a></td>
                    <td><a href="/top/{{$post->id}}/delete" onclick="return confirm('この投稿を削除してよろしいですか？')"><img src="images/trash.png"></a></td>
                  </div>
                  @endif
                </div>
            </tr>
            @endforeach
        </table>
    </div>
</div>

<!-- =============確認用============== -->
<p>ID:{{$user["id"]}}</p>
<br>
<p>posts:</p>
<?php
foreach ($posts as $list) {
    echo $list->post;
}
echo '<br>ログインユーザー：'.$user;
echo '<br>post_array：'.$posts;
?>
@endsection
