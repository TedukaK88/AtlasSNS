@extends('layouts.login')

@section('content')
<!-- <h2>ユーザー検索ページ</h2> -->
<div class="container">
    <div class="search-container">
        <form action="/search_result" method="GET">
            <input class="search-form" type="text" id="keyword" name="keyword" placeholder="ユーザー名">
            <!-- <button type="submit" class="search-button"></button> -->
            <input type="submit" value="🔍">
        </form>
        <?php if(isset($keyword)){
        echo '<p>検索ワード：';
        echo $keyword;
        echo '</p>'; }?>
    </div>
    <div class="table-container">
        <table class="search-table">
            @foreach ($users as $list)
            <tr>
                <td><img src="images/icon1.png"></td>
                <td><p>{{$list->username}}</p></td>
                <form action="/f_user" method="get">
                <td><button type="submit" id="f_user" name="f_user" class="follow-button" value="{{$list->id}}">フォローする</button></td>
                </form>
                <form action="/f_cancel_user" method="get">
                <td><button type="submit" id="f_cancel_user" name="f_cancel_user" class="follow-cancel-button" value="{{$list->id}}" onclick="return confirm('フォローを解除してよろしいですか？')">フォロー解除</button></td>
                </form>
            </tr>
            @endforeach
        </table>
    </div>
</div>
<?php
foreach ($users as $list) {
    echo $list->id;
    echo $list->username;
}
if(isset($follows)){
    echo $follows;
}else{
    echo "none";
}
?>



@endsection