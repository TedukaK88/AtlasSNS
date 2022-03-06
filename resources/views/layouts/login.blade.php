<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
    <!--IEブラウザ対策-->
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="ページの内容を表す文章" />
    <title></title>
    <link rel="stylesheet" href="{{ asset('css/reset.css') }} ">
    <link rel="stylesheet" href="{{ asset('css/style.css') }} ">
    <!--スマホ,タブレット対応-->
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <!--サイトのアイコン指定-->
    <link rel="icon" href="画像URL" sizes="16x16" type="image/png" />
    <link rel="icon" href="画像URL" sizes="32x32" type="image/png" />
    <link rel="icon" href="画像URL" sizes="48x48" type="image/png" />
    <link rel="icon" href="画像URL" sizes="62x62" type="image/png" />
    <!--iphoneのアプリアイコン指定-->
    <link rel="apple-touch-icon-precomposed" href="画像のURL" />
    <!--OGPタグ/twitterカード-->
</head>
<body>
    <header>
        <div id = "head">
        <h1><a href="/top"><img src="images/atlas.png" class="logo"></a></h1>
            <div id = "">
                <div id = "menu">
                    <p class="header-name">{{$user["username"]}}　さん</p>
                    <input id="acd-trigger1" class="acd-trigger" type="checkbox">
                    <label class="acd-label" for="acd-trigger1">∨</label>
                <ul class="accordion-menu">
                    <li class="menu-list"><a href="/top">HOME</a></li>
                    <li class="menu-list"><a href="/profile">プロフィール編集</a></li>
                    <li class="menu-list"><a href="/logout">ログアウト</a></li>
                </ul>
                    <img class="icon" src="images/icon1.png">
                <div>
            </div>
        </div>
    </header>
    <div id="row">
        <div id="container">
            @yield('content')
        </div >
        <div id="side-bar">
            <div id="confirm">
                <p>{{$user["username"]}}さんの</p>
                <div class="sb-container">
                <p>フォロー数</p>
                <?php  //フォロー・フォロワー人数計算用
                $following_cnt = count($following);
                $followed_cnt = count($followed);
                ?>
                <p>{{$following_cnt}}名</p>
                </div>
                <p class="btn"><a href="/follow-list">フォローリスト</a></p>
                <div class="sb-container">
                <p>フォロワー数</p>
                <p>{{$followed_cnt}}名</p>
                </div>
                <p class="btn"><a href="/follower-list">フォロワーリスト</a></p>
                <p class="btn"><a href="/search">ユーザー検索</a></p>
            </div>
        </div>
    </div>
    </div>
    <footer>　<!-- 確認用 -->
        <p>user_id：{{$user["id"]}}</p><br>
        <p>user：{{$user["username"]}}</p>
        <p>following：{{$following}}</p>
        <p>followed：{{$followed}}</p>
    </footer>
    <script src="JavaScriptファイルのURL"></script>
    <script src="JavaScriptファイルのURL"></script>
</body>
</html>
