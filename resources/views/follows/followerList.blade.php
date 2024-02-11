@extends('layouts.login')
@section('content')
<!-- 自分をフォローしているユーザーのアイコンを表示する処理 -->
<div class="post-form">
  @foreach($follower_user as $follow)
    <figure><a href="/user/profile/{{$follow->id}}"><img src="{{ asset('images/'. $follow->images)}}" alt="User Icon"></a></figure>
  @endforeach
</div>


<!-- フォローしているユーザーのアイコン、名前、投稿、投稿日時、 -->
  @foreach($follower_post as $follow)
    <div>
      <ul>
        <li class="post-block">
          <!-- アイコン -->
          <figure><a href="/user/profile/{{$follow->id}}"><img src="{{ asset('images/'. $follow->user->images)}}" alt="User Icon"></a></figure>
          <div class="post-content">
            <div>
              <!-- ユーザー名と投稿日時を表示する -->
              <div class="post-name">{{ $follow->user->username }}</div>

              <!-- postモデルとのリレーションが上手できていない可能性がある。 -->
              <div>{{  $follow->created_at }}</div>
            </div>
            <!-- 投稿内容を表示する -->
            <div>{{ $follow->post}}</div>
          </div>
        </li>
      </ul>
    </div>
  @endforeach

@endsection
