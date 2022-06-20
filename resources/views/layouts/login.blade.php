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
    <!-- Google Material Icons -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
</head>
<body>
    <header>
        <div id = "head">
        <h1><a href="/post/index"><img src="/images/atlas.png" class="logo"></a></h1>
            <div id = "">
                <div id = "menu">
                    <p class="header-name">{{$user["username"]}}　 さん</p>
                    <input id="acd-trigger1" class="acd-trigger" type="checkbox">
                    <label id="acd-button" class="acd-label" for="acd-trigger1"><span class="acd-button1">∨</span><span class="acd-button2 hide">∧</span></label>
                <ul class="accordion-menu">
                    <li class="menu-list"><a href="/post/index">HOME</a></li>
                    <li class="menu-list"><a href="/profile/{{$user->id}}">プロフィール編集</a></li>
                    <li class="menu-list"><a href="/logout">ログアウト</a></li>
                </ul>
                    <img class="header-icon prof-icon" src="{{'/storage/images/'.$user['images']}}">
                <div>
            </div>
        </div>
    </header>
    <div id="row">
        <div id="container">
            @yield('content')
        </div >
        <div id="side-bar">
            <div class="side-bar">
                <p class="sb-name">{{$user["username"]}}さんの</p>
                <div class="sb-container">
                    <?php  //フォロー・フォロワー人数計算用
                        $following_cnt = count($following);
                        $followed_cnt = count($followed);
                    ?>
                    <div class="sb-label">
                        <p>フォロー数</p>
                        <p>{{$following_cnt}}人</p>
                    </div>
                    <p class="btn text-button list-button"><a href="/follow-list">フォローリスト</a></p>
                    <br>
                    <div class="sb-label">
                        <p>フォロワー数</p>
                        <p>{{$followed_cnt}}人</p>
                    </div>
                    <p class="btn text-button list-button"><a href="/follower-list">フォロワーリスト</a></p>
                </div>

                <p class="btn text-button search-button"><a href="/search">ユーザー検索</a></p>
            </div>
        </div>
    </div>
    </div>
    <footer>
    </footer>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="{{ asset('js/script.js') }} "></script>
</body>
</html>
