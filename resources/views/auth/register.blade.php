@extends('layouts.logout')

@section('content')
<!-- 適切なURLを入力してください -->
{!! Form::open(['url' => '/register']) !!}

<!-- @php
$username = request()->input('username');
request()->session()->put('username', $username);
@endphp -->


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




<div class="register-form">
    {!! Form::open(['url' => '/register']) !!}
    <p class="register-content">新規ユーザー登録</p>

    {{ Form::label('username', null, ['class' => 'name-label'])  }}
    {{ Form::text('username',null,['class' => 'input login-name' ]) }}

    {{ Form::label('e-mail', null, ['class' => 'mail-label'])  }}
    {{ Form::text('mail',null,['class' => 'input login-mail' ]) }}

    {{ Form::label('password', null, ['class' => 'pass-label']) }}
    {{ Form::password('password',null,['class' => 'input login-pass']) }}

    {{ Form::label('pass確認', null, ['class' => 'pass-label']) }}
    {{ Form::password('password_confirmation',null,['class' => 'input login-pass']) }}

    {{ Form::submit('登録' , ['class' =>'btn btn-danger login-button']) }}

    <p class="login-register"><a href="/login">ログイン画面へ戻る</a></p>

    {!! Form::close() !!}
</div>



@endsection
