@extends('layouts.login')

@section('content')
<div class="container">
  <!-- -------------------------------------------------------------------------------------------------------------------------------------------------------------------- -->
  <!--         top content -->
    <div class="post-container"> <!--class名仮置き-->
        <h2>Follow List</h2>
        <div class="icon-box">
            @foreach($posts as $post)
            <a href=""><img src="/storage/images/{{$post->images}}" class="icon in-box"></a>
            @endforeach
            <a href=""><img src="images/icon1.png" class="icon in-box"></a>    <!--  表示限界確認用ダミー -->
            <a href=""><img src="images/icon1.png" class="icon in-box"></a>    <!--  表示限界確認用ダミー -->
            <a href=""><img src="images/icon1.png" class="icon in-box"></a>    <!--  表示限界確認用ダミー -->
            <a href=""><img src="images/icon1.png" class="icon in-box"></a>    <!--  表示限界確認用ダミー -->
            <a href=""><img src="images/icon1.png" class="icon in-box"></a>    <!--  表示限界確認用ダミー -->
            <a href=""><img src="images/icon1.png" class="icon in-box"></a>    <!--  表示限界確認用ダミー -->
            <a href=""><img src="images/icon1.png" class="icon in-box"></a>    <!--  表示限界確認用ダミー -->
            <a href=""><img src="images/icon1.png" class="icon in-box"></a>    <!--  表示限界確認用ダミー -->
            <a href=""><img src="images/icon1.png" class="icon in-box"></a>    <!--  表示限界確認用ダミー -->
            <a href=""><img src="images/icon1.png" class="icon in-box"></a>    <!--  表示限界確認用ダミー -->
            <a href=""><img src="images/icon1.png" class="icon in-box"></a>    <!--  表示限界確認用ダミー -->
            <a href=""><img src="images/icon1.png" class="icon in-box"></a>    <!--  表示限界確認用ダミー -->
            <a href=""><img src="images/icon1.png" class="icon in-box"></a>    <!--  表示限界確認用ダミー -->
            <a href=""><img src="images/icon1.png" class="icon in-box"></a>    <!--  表示限界確認用ダミー -->
            <a href=""><img src="images/icon1.png" class="icon in-box"></a>    <!--  表示限界確認用ダミー -->
            <a href=""><img src="images/icon1.png" class="icon in-box"></a>    <!--  表示限界確認用ダミー -->
            <a href=""><img src="images/icon1.png" class="icon in-box"></a>    <!--  表示限界確認用ダミー -->
            <a href=""><img src="images/icon1.png" class="icon in-box"></a>    <!--  表示限界確認用ダミー -->
            <a href=""><img src="images/icon1.png" class="icon in-box"></a>    <!--  表示限界確認用ダミー -->
            <a href=""><img src="images/icon1.png" class="icon in-box"></a>    <!--  表示限界確認用ダミー -->
            <a href=""><img src="images/icon1.png" class="icon in-box"></a>    <!--  表示限界確認用ダミー -->
            <a href=""><img src="images/icon1.png" class="icon in-box"></a>    <!--  表示限界確認用ダミー -->
            <a href=""><img src="images/icon1.png" class="icon in-box"></a>    <!--  表示限界確認用ダミー -->
            <a href=""><img src="images/icon1.png" class="icon in-box"></a>    <!--  表示限界確認用ダミー -->
            <a href=""><img src="images/icon1.png" class="icon in-box"></a>    <!--  表示限界確認用ダミー -->
            <a href=""><img src="images/icon1.png" class="icon in-box"></a>    <!--  表示限界確認用ダミー -->
            <a href=""><img src="images/icon1.png" class="icon in-box"></a>    <!--  表示限界確認用ダミー -->
            <a href=""><img src="images/icon1.png" class="icon in-box"></a>    <!--  表示限界確認用ダミー -->
            <a href=""><img src="images/icon1.png" class="icon in-box"></a>    <!--  表示限界確認用ダミー -->
            <a href=""><img src="images/icon1.png" class="icon in-box"></a>    <!--  表示限界確認用ダミー -->
            <a href=""><img src="images/icon1.png" class="icon in-box"></a>    <!--  表示限界確認用ダミー -->
            <a href=""><img src="images/icon1.png" class="icon in-box"></a>    <!--  表示限界確認用ダミー -->
            <a href=""><img src="images/icon1.png" class="icon in-box"></a>    <!--  表示限界確認用ダミー -->
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
@endsection
