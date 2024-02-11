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

{!! Form::open(['url' => '/profile/update']) !!}

            {{ Form::hidden('id', $user->id) }}
            <!-- ユーザー名 -->
            {{ Form::label('ユーザー名') }}
            {{ Form::input('text', 'upName', $user->username, ['required', 'class' => 'form-control']) }}

            <!-- アドレス -->
            {{ Form::label('メールアドレス') }}
            {{ Form::input('text', 'upMail', $user->mail, ['required', 'class' => 'form-control']) }}

            <!-- 自己紹介 -->
            {{ Form::label('自己紹介') }}
            {{ Form::input('text', 'upBio', $user->bio, ['required', 'class' => 'form-control']) }}

             <!-- パスワードは初期値入れない -->
            <!-- パスワード -->
            {{ Form::label('パスワード') }}
            {{ Form::password('newPass', null,['required', 'class' => 'form-control']) }}

            <!-- パスワード確認用 -->
            {{ Form::label('パスワード確認用') }}
            {{ Form::password('newPassCon', null, ['required', 'class' => 'form-control']) }}




        <button type="submit" class="btn btn-primary pull-right">更新</button>
        {!! Form::close() !!}


@endsection
