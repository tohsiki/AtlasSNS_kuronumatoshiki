@extends('layouts.login')

@section('content')

{!! Form::open(['url' => '/profiles']) !!}

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


        <button type="submit" class="btn btn-primary pull-right">更新</button>
        {!! Form::close() !!}


@endsection
