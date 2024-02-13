<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <!--IEブラウザ対策-->
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="description" content="ページの内容を表す文章" />
  <title></title>
  <link rel="stylesheet" href="{{ asset('css/reset.css') }} ">
  <link rel="stylesheet" href="{{ asset('css/logout.css') }} ">

   <!-- スクリプトの呼び出し -->
  <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
  <script src="{{ asset('js/script.js') }}"></script>

  <!--スマホ,タブレット対応-->
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <!--サイトのアイコン指定-->
  <link rel="icon" href="画像URL" sizes="16x16" type="image/png" />
  <link rel="icon" href="画像URL" sizes="32x32" type="image/png" />
  <link rel="icon" href="画像URL" sizes="48x48" type="image/png" />
  <link rel="icon" href="画像URL" sizes="62x62" type="image/png" />
  <!--iphoneのアプリアイコン指定-->
  <link rel="apple-touch-icon-precomposed" href="画像のURL" />

     <!-- Bootstrapの読み込み -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

  <!--OGPタグ/twitterカード-->
</head>
<body>
  <header>
    <h1><img src="images/atlas.png"></h1>
    <p>Social Network Service</p>
  </header>
  <div id="container">
    @yield('content')
  </div>
  <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
 <script src="{{ asset('js/script.js') }}"></script>

</body>
</html>
