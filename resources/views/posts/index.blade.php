@extends('layouts.login')

@section('content')
<div class="container">
  <!-- -------------------------------------------------------------------------------------------------------------------------------------------------------------------- -->
  <!--         top content -->
    <div class="post-container"> <!--class名仮置き-->
      <img src="{{'/storage//images/'.$user['images']}}" class="prof-icon">
      {!! Form::open(['url' => 'post']) !!}
      <div class="post-form"> <!--class仮置き-->
        {!! Form::textarea('newPost',null,['required','class'=>'post-form','placeholder'=>'投稿内容を入力してください。','rows'=>4,'maxlength'=>150]) !!}
        <button type="submit" class="button-reset post-button"><img src="/images/post.png"></button>
      </div>
      {!! Form::close() !!}
    </div>
    <!-- ----------------------------------------------------------------------------------------------------------------------------------------------------------------- -->
    <!-- post table -->
    <div class="post-list">
      <ul>
        @foreach($posts as $post)
        <li class="post-block">
          <div class="post-list-left-space"></div>
              <figure><a href="/profile/{{$post->user_id}}"><img src="/storage//images/{{$post->images}}" class="icon"></a>
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
                    @if($post->user_id === $user->id) <!-- post本人かチェック ※$user　は Controller で ログインユーザー１人のみの配列 として作成してある-->
                  <div class="post-action">
                    <td><div class="icon-bg"><a href="#" class="modalOpen" id="{{$post->id}}" data-target="{{$post->id}}" data-post="modal{{$post->post}}"><img class="post-icon" src="/images/edit.png"></a></div></td>
                    <td><div class="icon-bg delete-icon-bg"><a href="/post/index/{{$post->id}}/delete" onclick="return confirm('この投稿を削除してよろしいですか？')"><img class="post-icon delete-icon" src="/images/trash.png"></a></div></td>
                  </div>
                  @endif
                </div>
              </div>


        </li>
        @endforeach
    </div>
    <!-- ===============  モーダル用データ  ============================================= -->
    <div class="modal-main js-modal" id="modal">
      <div class="modalClose">
      </div>
        <div class="modal-inner">
          <div class="inner-content">
            {!! Form::open(['url' => '/post/index/update']) !!}
            {!! Form::hidden('id', "value ID",['id'=>'postId']) !!}
            {!! Form::textarea('upPost',"value POST",['required','class'=>'update-form','placeholder'=>'内容を入力してください。','rows'=>10,'maxlength'=>150]) !!}
            <br>
            <button type="submit" class="post-button update-button" onclick="return confirm('この内容で上書きしてよろしいですか？')"><img src="/images/edit.png"></button>
            {!! Form::close() !!}
          </div>
        </div>
    </div>
    <!-- ================================================================================ -->
</div>
@endsection
