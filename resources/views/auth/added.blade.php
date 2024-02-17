@extends('layouts.logout')

@section('content')

<div id="clear">
  <div class="added-container">
    <p>{{ session('username') }}さん</p>
    <p>ようこそ！AtlasSNSへ！</p>
    <p>ユーザー登録が完了いたしました。</p>
    <p>早速ログインをしてみましょう。</p>
    <p class="btn btn-danger added-button"><a href="/login" class=" added-button">ログイン画面へ</a></p>
  </div>
</div>

@endsection
