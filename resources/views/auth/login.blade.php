@extends('layouts.logout')

@section('content')
<!-- 適切なURLを入力してください-->
<div class="login-form">
{!! Form::open(['url' => '/login']) !!}

<p class="login-content">KNowで今を見に行こう</p>

{{ Form::label('メールアドレス', null, ['class' => 'mail-label']) }}
{{ Form::text('mail',null,['class' => 'input login-mail']) }}
{{ Form::label('パスワード', null, ['class' => 'pass-label']) }}
{{ Form::password('password',['class' => 'input login-pass']) }}

{{ Form::submit('ログイン', ['class' =>'btn btn-danger login-button']) }}

<p class="login-register"><a href="/register">新規ユーザーの方はこちら</a></p>

{!! Form::close() !!}

</div>


@endsection
