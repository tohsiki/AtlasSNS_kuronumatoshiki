@extends('layouts.login')

@section('content')
<!-- ユーザー検索画面のタスク -->
<!-- ①ユーザー検索用のフォーム -->
 {!! Form::open(['url' => '/search']) !!}
  <!-- 検索用のフォーム -->
  <div class="search">
      <div class="search-from">
        {{Form::text('keyword', null,['class' => 'input', 'placeholder' => "ユーザー名"])}}
        {!! Form::image('images/search.png', 'submit', ['class' => 'submit-button']) !!}
      </div>
    {{ Form::close() }}

    @if(!empty($search))
      <div class="search-word">{{$search}}</div>
    @endif
  </div>



<!-- ②ユーザーの一覧　（あいまい検索後にしぼ込まれる機能付き） -->
@foreach($users as $user)
  <!-- 要素を真ん中に寄せる用 -->
  <div>
    <!-- アイコンと名前を横並びにする用 -->
    <ul>
      <!-- display:flex当てる用 -->
      <li class="search-block">
        <figure><img src="{{ asset('images/'. $user->images) }}" alt="User Icon"></figure>
        <div class="search-name">{{$user->username }}</div>

        <form method="POST" action="/unfollow">
                @csrf
        <input name="follow_id" type="hidden" value="{{ $user->id }}" />
        <!-- isFollowがtrueならフォロー解除ボタンを表示、falseならフォローするボタンを表示する。 -->
          <button type="submit"class="follow-btn">
            フォロー解除</button>

        </form>
        <form method="POST" action="/follow">
                @csrf
            <input name="follow_id" type="hidden" value="{{ $user->id }}" />
          <button type="submit" class="bg-info text-white follow-btn">
            フォローする</button>
        </form>
      </li>
    </ul>
    <!-- 検索ワードの表示用 -->

  </div>
@endforeach


<!-- ③検索後に検索ワードを別で表示する機能 -->
@endsection
