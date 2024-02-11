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
<!-- ログインしているユーザーは表示しないようにif文をつける。 -->
@foreach($users as $user)
@if($user->id !== Auth::user()->id)
  <!-- 要素を真ん中に寄せる用 -->
  <div>
    <!-- アイコンと名前を横並びにする用 -->
    <ul>
      <!-- display:flex当てる用 -->
      <li class="search-block">
        <figure><a href="/user/profile/{{$user->id}}"><img src="{{ asset('images/'. $user->images) }}" alt="User Icon"></a></figure>
        <div class="search-name">{{$user->username }}</div>
        <!-- ここにif文を追加してフォロー機能ができたら確認する。 -->
        @if(Auth::user()->isFollow($user->id))
        <form method="POST" action="/unfollow">
                @csrf
          <input name="follow_id" type="hidden" value="{{ $user->id }}" />
          <!-- isFollowがtrueならフォロー解除ボタンを表示、falseならフォローするボタンを表示する。 -->
          <button type="submit"class="btn btn-danger follow-btn">フォロー解除</button>
        </form>
        @else
        <form method="POST" action="/follow">
              @csrf
          <input name="follow_id" type="hidden" value="{{ $user->id }}" />
          <button type="submit" class="btn btn-primary  follow-btn">フォローする</button>
        </form>
        @endif
      </li>
    </ul>
    <!-- 検索ワードの表示用 -->

  </div>
  @endif
@endforeach


<!-- ③検索後に検索ワードを別で表示する機能 -->
@endsection
