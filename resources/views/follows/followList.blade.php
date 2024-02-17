@extends('layouts.login')

@section('content')
<!-- 自分がフォローしているユーザーのアイコンを表示する処理 -->
<div class="post-form follow-form">
  <h3 class="list-title">Follow List</h3>
  @foreach($followed_user as $follow)
    <figure><a href="/user/profile/{{$follow->id}}"><img src="{{ asset('storage/images/'. $follow->images)}}" alt="User Icon" class="follow-icon"></a></figure>
  @endforeach
</div>


<!-- フォローしているユーザーのアイコン、名前、投稿、投稿日時、 -->
  @foreach($followed_post as $follow)
    <div>
      <ul>
        <li class="post-block">
          <!-- アイコン -->
          <figure><a href="/user/profile/{{$follow->id}}"><img src="{{ asset('storage/images/'. $follow->user->images)}}" alt="User Icon" class="index-icon"></a></figure>
          <div class="post-content">
            <div>
              <!-- ユーザー名と投稿日時を表示する -->
              <div class="post-name">{{ $follow->user->username }}</div>
              <!-- postモデルとのリレーションが上手できていない可能性がある。 -->
              <div>{{  $follow->created_at->format('Y-m-d H:i') }}</div>
            </div>
            <!-- 投稿内容を表示する -->
            <div>{!! nl2br(htmlspecialchars($follow->post)) !!}</div>
          </div>
        </li>
      </ul>
    </div>
  @endforeach
@endsection
