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
    {!! Form::open(['url' => '/profile/update', 'enctype' => 'multipart/form-data']) !!}
        {{ Form::hidden('id', $user->id) }}

        <!-- ユーザー名 -->
        <div class="profile-form">
            {{ Form::label('ユーザー名') }}
            {{ Form::input('text', 'upName', $user->username, [ 'class' => 'form-control']) }}
        </div>


        <!-- アドレス -->
        <div class="profile-form">
            {{ Form::label('メールアドレス') }}
            {{ Form::input('text', 'upMail', $user->mail, [ 'class' => 'form-control']) }}
        </div>


        <!-- 自己紹介 -->
        <div class="profile-form">
            {{ Form::label('自己紹介') }}
             {{ Form::input('text', 'upBio', $user->bio, ['class' => 'form-control']) }}
        </div>


            <!-- パスワードは初期値入れない -->
        <!-- パスワード -->
        <div class="profile-form">
            {{ Form::label('パスワード') }}
            {{ Form::password('newPass', null,[ 'class' => 'form-control']) }}
        </div>


        <!-- パスワード確認用 -->
        <div class="profile-form">
            {{ Form::label('パスワード確認用') }}
            {{ Form::password('newPassCon', null, [ 'class' => 'form-control']) }}
        </div>

         <div class="profile-form">
            {{ Form::label('アイコン更新') }}
            {{ Form::file('newIcon', ['class'=>'','id'=>'fileImage'] )}}
        </div>


        <button type="submit" class="btn btn-danger pull-right">更新</button>
    {!! Form::close() !!}
</div>



@endsection
