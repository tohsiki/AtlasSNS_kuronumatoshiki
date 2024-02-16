@extends('layouts.login')

@section('content')
<!-- アイコンとユーザー名を表示する処理(index.blade.phpと同じクラスを用いた方が楽) -->


<!-- 他ユーザーのアイコン、名前、自己紹介文を表示する処理 -->
 <div class="post-form profile-form">
  <!-- 選択されたユーザーのアイコンを表示 -->
  <img src="{{asset('images/'.$user_profile->images)}}" alt="User Icon">
<!-- ユーザー名の表示 -->
  <div class="profile-content">
     <!-- ユーザー名を表示する -->
    <div class="profile-name">
      <p>name</p>
      <div class="post-name">{{$user_profile->username }}</div>
    </div>
    <!-- 自己紹介を表示する -->
    <div class="profile-bio">
      <p>自己紹介</p>
      <div>{{$user_profile->bio }}</div>
    </div>
  </div>
  <div class="userfollow-btn">
    @if(Auth::user()->isFollow($user_profile->id))
      <form method="POST" action="/unfollow" >
                @csrf
        <input name="follow_id" type="hidden" value="{{ $user_profile->id }}" />
        <!-- isFollowがtrueならフォロー解除ボタンを表示、falseならフォローするボタンを表示する。 -->
        <button type="submit"class="btn btn-danger follow-btn userfollow-btn">フォロー解除</button>
      </form>
  @else
      <form method="POST" action="/follow">
              @csrf
        <input name="follow_id" type="hidden" value="{{ $user_profile->id }}" />
        <button type="submit" class="btn btn-primary  follow-btn userfollow-btn">フォローする</button>
      </form>
  @endif
  </div>

</div>


<!-- foreachでユーザーのアイコン、名前、投稿内容、投稿日時を出す処理を取得する処理 -->
 @foreach($profiles as $profile)
  <div>
    <ul>
      <li class="post-block">
        <!-- アイコン -->
        <figure><img src="{{ asset('images/'. $profile->user->images)}}" alt="User Icon"></figure>
        <div class="post-content">
          <div>
            <!-- ユーザー名と投稿日時を表示する -->
            <div class="post-name">{{$profile->user->username }}</div>

            <!-- postモデルとのリレーションが上手できていない可能性がある。 -->
            <div>{{ $profile->created_at }}</div>
          </div>
          <!-- 投稿内容を表示する -->
            <div>{{$profile->post}}</div>
          </div>
      </li>
    </ul>
  </div>
 @endforeach

@endsection
