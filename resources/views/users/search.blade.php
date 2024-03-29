@extends('layouts.login')

@section('content')
<!-- ユーザー検索画面のタスク -->
<!-- ①ユーザー検索用のフォーム -->
  <!-- 検索用のフォーム -->
  <div class="search">
      <div class="search-form">
        {!! Form::open(['url' => '/search']) !!}
          <div class="search-button">
            {{Form::text('keyword', null,['class' => 'input search-input', 'placeholder' => "ユーザー名"])}}
            {!! Form::image('images/magnifying-glass-solid.svg', 'submit', ['class' => 'search-image']) !!}
          </div>
        {{ Form::close() }}
        @if(!empty($search))
          <div class="search-word">{{$search}}</div>
        @endif
          </div>
      </div>
  @foreach($users as $user)
    @if($user->id !== Auth::user()->id)
    <!-- 要素を真ん中に寄せる用 -->
      <div class="search-items">
      <!-- アイコンと名前を横並びにする用 -->
        <ul class="search-list">
          <li class="search-block">
            <figure><a href="/user/profile/{{$user->id}}"><img src="{{ asset('storage/images/'. $user->images) }}" alt="User Icon" class="index-icon"></a></figure>
            <div class="search-name">{{$user->username }}</div>
            @if(Auth::user()->isFollow($user->id))
              <!-- フォローしていたらフォロー解除ボタンを押す -->
              <form method="POST" action="/unfollow">
                @csrf
                <input name="follow_id" type="hidden" value="{{ $user->id }}" />
                <!-- isFollowがtrueならフォロー解除ボタンを表示、falseならフォローするボタンを表示する。 -->
                <button type="submit"class="btn btn-danger follow-btn">フォロー解除</button>
              </form>
            @else
              <!-- フォローしていなかったらフォローするボタン -->
              <form method="POST" action="/follow">
                @csrf
                <input name="follow_id" type="hidden" value="{{ $user->id }}" />
                <button type="submit" class="btn btn-info  follow-btn">フォローする</button>
              </form>
            @endif
          </li>
        </ul>
      </div>
    @endif
  @endforeach
@endsection
