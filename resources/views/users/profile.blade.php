@extends('layouts.login')
@section('content')
<!--バリデーションのエラーメッセージ-->
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<div class="profile-container">
    <div class="profile-form">
            {!! Form::open(['url' => '/profile/update', 'enctype' => 'multipart/form-data']) !!}
            {{ Form::hidden('id', $user->id) }}
            <div class="profile-image">
                <img src="{{asset('storage/images/'. Auth::user()->images)}}" class="profile-icon" alt="User Icon">
            </div>

            <!-- ユーザー名 -->
        <div class="profile-items">
            <p class="profile-itemp">ユーザー名</p>
            {{ Form::input('text', 'upName', $user->username, [ 'class' => 'up-form']) }}
        </div>
        <div class="profile-items">
            <!-- アドレス -->
            <p class="profile-itemp">メールアドレス</p>
            {{ Form::input('text', 'upMail', $user->mail, [ 'class' => 'profile-mail up-form']) }}
        </div>
        <div class="profile-items">
            <!-- パスワード -->
            <p class="profile-itemp">パスワード</p>
            {{ Form::password('newPass',[ 'class' => 'profile-pass up-form']) }}
        </div>
        <!-- パスワードは初期値入れない -->
        <div class="profile-items">
            <!-- パスワード確認用 -->
            <p class="profile-itemp">パスワード確認</p>
            {{ Form::password('newPassCon',  [ 'class' => 'profile-pass up-form']) }}
        </div>
        <div class="profile-items">
            <!-- 自己紹介 -->
            <p class="profile-itemp">自己紹介</p>
            {{ Form::input('text', 'upBio', $user->bio, ['class' => 'profile-bio up-form']) }}
        </div>
        <div class="profile-items update-icon">
            <!-- アイコンの更新 -->
            <!-- 選択されていませんを削除する。 -->
            <p class="profile-itemp">アイコン更新</p>
            <div class="icon-profile">
                <label for="newIcon" class="custom-file-upload">
                <input type="file" class="profile-icon icon-imag" id="newIcon" name="newIcon">
                <p class="">ファイルを選択</p>
                </label>
            </div>
        </div>
        <div class="">
            <button type="submit" class="btn btn-danger pull-right update-btn">更新</button>
        </div>
            {!! Form::close() !!}
    </div>
</div>
@endsection
