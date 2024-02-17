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
            <!-- ユーザー名 -->
        <div class="profile-items">
            <p>ユーザー名</p>
            {{ Form::input('text', 'upName', $user->username, [ 'class' => 'profile-name up-form']) }}
        </div>
        <div class="profile-items">
            <!-- アドレス -->
            <p>メールアドレス</p>
            {{ Form::input('text', 'upMail', $user->mail, [ 'class' => 'profile-mail up-form']) }}
        </div>
        <div class="profile-items">
            <!-- パスワード -->
            <p>パスワード</p>
            {{ Form::password('newPass',[ 'class' => 'profile-pass up-form']) }}
        </div>
        <!-- パスワードは初期値入れない -->
        <div class="profile-items">
            <!-- パスワード確認用 -->
            <p>パスワード確認</p>
            {{ Form::password('newPassCon',  [ 'class' => 'profile-pass up-form']) }}
        </div>
        <div class="profile-items">
            <!-- 自己紹介 -->
            <p>自己紹介</p>
            {{ Form::input('text', 'upBio', $user->bio, ['class' => 'profile-bio up-form']) }}
        </div>

        <div class="profile-items update-icon">
            <!-- アイコンの更新 -->
            <!-- 選択されていませんを削除する。 -->
            <p>アイコン更新</p>
            <div class="icon-profile">
                <label for="newIcon" class="custom-file-upload">
                <input type="file" class="profile-icon icon-imag" name="newIcon"><p class="custom-file-upload">ファイルを選択</p>
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
