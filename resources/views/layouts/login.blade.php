<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
    <!--IEブラウザ対策-->
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="ページの内容を表す文章" />
    <title></title>
    <!-- asset:publicフォルダがスタートになるという意味。 -->
    <link rel="stylesheet" href="{{ asset('css/reset.css') }} ">
    <link rel="stylesheet" href="{{ asset('css/style.css') }} ">

    <!-- Bootstrapの読み込み -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <!--スマホ,タブレット対応-->
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <!--サイトのアイコン指定-->
    <link rel="icon" href="画像URL" sizes="16x16" type="image/png" />
    <link rel="icon" href="画像URL" sizes="32x32" type="image/png" />
    <link rel="icon" href="画像URL" sizes="48x48" type="image/png" />
    <link rel="icon" href="画像URL" sizes="62x62" type="image/png" />
    <!--iphoneのアプリアイコン指定-->
    <link rel="apple-touch-icon-precomposed" href="画像のURL" />

    <!-- スクリプトの呼び出し -->

    <!--OGPタグ/twitterカード-->
</head>
<body>
    <header>
        <div id = "head">
            <h1><a href="/top"><img src="{{asset('images/atlas.png')}}" class="logo-image"></a></h1>
            <div id="head-parts">
                <div id="head-item">

                    <p class="head-name">{{Auth::user()->username}}     さん</p>
                    <!-- モーダル機能を作る -->

                    <nav>
                        <ul class="menu">
                            <li class="menu-item">
                                <ul class="menuSub">
                                    <li class="menuSub_item"><a href="/top">ホーム</a></li>
                                    <li class="menuSub_item"><a href="/profile">プロフィール</a></li>
                                    <li class="menuSub_item"><a href="/logout">ログアウト</a></li>
                                </ul>
                            </li>
                        </ul>
                    </nav>
                    <img src="{{asset('images/icon1.png')}}">
                </div>
            </div>
        </div>
    </header>
        <div id="row">
            <div id="container">
                @yield('content')
            </div >
            <div id="side-bar">
                    <div id="confirm">
                        <p>{{Auth::user()->username}}さんの</p>
                        <div class="confirm-follow">
                            <p>フォロー数</p>
                            <p>{{ Auth::user()->follows()->get()->count() }}名</p>
                        </div>
                            <p class="btn btn-primary index-button"><a href="/follow-list" class="confirm-button">フォローリスト</a></p>
                        <div class="confirm-follow">
                            <p>フォロワー数</p>
                            <p>{{ Auth::user()->follower()->get()->count() }}名</p>
                        </div>
                            <p class="btn btn-primary index-button"><a href="/follower-list" class="confirm-button">フォロワーリスト</a></p>
                    </div>
                    <div class="confirm-search">
                        <p class="btn btn-primary post_del_btn search-page"><a class=" confirm-button" href="/search">ユーザー検索</a></p>
                    </div>
            </div>
            </div>
        </div>
    <footer>
    </footer>

    <!-- jQuery記述を行う。 -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="{{ asset('js/script.js') }}"></script>

    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="{{ asset('js/drop.js') }}"></script>
</body>
</html>
