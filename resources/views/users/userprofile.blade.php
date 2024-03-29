@extends('layouts.login')

@section('content')
<!-- アイコンとユーザー名を表示する処理(index.blade.phpと同じクラスを用いた方が楽) -->


<!-- 他ユーザーのアイコン、名前、自己紹介文を表示する処理 -->
 <div class="user-form">
  <!-- 選択されたユーザーのアイコンを表示 -->
  <img src="{{asset('storage/images/'.$user_profile->images)}}" alt="User Icon" class="index-icon user-icon">


<!-- ユーザー名の表示 -->
  <div class="profile-content">
     <!-- ユーザー名を表示する -->
    <div class="profile-name">
      <p>ユーザー名</p>
      <p>自己紹介</p>
    </div>
    <!-- 自己紹介を表示する -->
    <div class="profile-bio">
      <div class="post-items post-name"><p>{{$user_profile->username }}</p></div>
      <div class="post-items"><p>{{$user_profile->bio }}</p></div>
    </div>
  </div>
  <div class="">
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
        <figure><img src="{{ asset('storage/images/'. $profile->user->images)}}" alt="User Icon" class="index-icon"></figure>
        <div class="post-content">
          <div>
            <!-- ユーザー名と投稿日時を表示する -->
            <div class="post-name">{{$profile->user->username }}</div>

            <!-- postモデルとのリレーションが上手できていない可能性がある。 -->
            <div>{{ $profile->created_at->format('Y-m-d H:i') }}</div>
          </div>
          <!-- 投稿内容を表示する -->
            <div>{{$profile->post}}</div>
          </div>
      </li>
    </ul>
  </div>
 @endforeach

@endsection
