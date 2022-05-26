@extends('layouts.login')

@section('content')
<!-- <h2>ユーザー検索ページ</h2> -->
<div class="container">
    <div class="post-container search-container">
        <form action="/search_result" method="GET">
            <input class="search-form" type="text" id="keyword" name="keyword" placeholder="　ユーザー名">
            <!-- <button type="submit" class="search-button"></button> -->
            <input type="submit" class="search-form-button" value="🔍">
        </form>
        <?php if(isset($keyword)){
        echo '<p class="search-word">検索ワード：';
        echo $keyword;
        echo '</p>'; }?>
    </div>
    <div class="search-table">
        @foreach ($users as $list)
        <div class="user-list post-content">
            <a href="/profile/{{$list->id}}"><img class="prof-icon" src="/storage/images/{{$list->images}}"></a>
            <p class="search-name">{{$list->username}}</p>
            @if(in_array($list->id,$follows))
            <form action="/f_cancel_user" method="get">
            {!! Form::hidden('from', "/search") !!}
            <button type="submit" id="f_cancel_user" name="f_cancel_user" class="text-button  red2-button" value="{{$list->id}}" onclick="return confirm('フォローを解除してよろしいですか？')">フォロー解除</button>
            @else
            <form action="/f_user" method="get">
            {!! Form::hidden('from', "/search") !!}
            <button type="submit" id="f_user" name="f_user" class="text-button skyblue-button" value="{{$list->id}}">フォローする</button>
            @endif
            </form>
        </div>
        @endforeach
    </div>
</div>


@endsection