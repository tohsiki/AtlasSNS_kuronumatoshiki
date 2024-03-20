@extends('layouts.login')
@section('content')
  @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
  @endif
  <div class="post-form">
    <div>
      <!-- 投稿用の処理 -->
        {!! Form::open(['url' => '/post']) !!}
        <!-- ログインユーザーのアイコンを表示 -->
        <img src="{{asset('storage/images/'.Auth::user()->images)}}" alt="User Icon" class="post-icon">
        <!-- nullの左横にはname属性の値を入れる。 -->
       {{ Form::textarea('post', null, ['class' => 'post-input', 'placeholder' => '投稿内容を入力してください。', 'style' => 'overflow: hidden;']) }}
        <!-- 画像を埋め込みたい -->
         {!! Form::image('images/square-plus-solid.svg', 'submit', ['class' => 'submit-button']) !!}
        <!-- 投稿を表示させる処理 -->
        {!! Form::close() !!}
    </div>
</div>
  @foreach($followed_post as $post)
  <div>
    <ul>
      <li class="post-block">
        <!-- アイコン -->
        <figure><img src="{{ asset('storage/images/' . $post->user->images) }}" alt="User Icon" class="index-icon"></figure>
        <div class="post-content">
          <div class="post1">
            <!-- ユーザー名と投稿日時を表示する -->
            <div class="post-name">{{$post->user->username }}</div>
              <div>{{ $post->created_at->format('Y-m-d H:i')  }}</div>
          </div>
          <!-- 投稿内容を表示する -->
            <div>{!! nl2br(htmlspecialchars($post->post)) !!}</div>
                <!-- 投稿を編集するモーダルを表示させるボタンも別のif文を用意して書く -->
            <div class="post-button">
              @if (Auth::user()->id == $post->user_id)
                <div class="update-button">
                  <a class="js-modal-open upbutton" href="" post="{{ $post->post }}" post_id="{{ $post->id }}"><img src="images/edit.png" alt="編集" class="form-button form-edit"></a>
                </div>
              @endif
              @if (Auth::user()->id == $post->user_id)
                <!-- 最初に表示させておくボタン-->
                <div class="trash-button">
                  <!-- 投稿の削除ボタン -->
                  <p class="button"><a class="trash" href="/posts/{{$post->id}}/delete" onclick="return confirm('この投稿を削除します。よろしいでしょうか？')" method="get"><img src="/images/trash.png" width="20" height="20" alt="削除ボタン"></a></p>
                </div>
            {{ Form::close() }}
              @endif
              <!-- いいねボタンの記述 -->
              <div class="like-button">
                @if(Auth::user()->is_Like($post->id))
                <p class=""><i class="fa-sharp fas fa-thumbs-up un_like_btn" post_id="{{ $post->id }}"></i><span class="like_counts{{ $post->id }}">{{ $like->likeCounts($post->id) }}</span></p>
                @else
                  <!-- いいね数のカウントを追記 -->
                <p class=""  width="20" height="20"><i class="fa-sharp fas fa-thumbs-up like_btn" post_id="{{ $post->id }}"></i><span class="like_counts{{ $post->id }}">{{ $like->likeCounts($post->id) }}</span></p>
                @endif
              </div>

              <!-- いいねボタンの記述 　ここまで-->
            </div>
          </div>
      </li>
    </ul>
  </div>
  @endforeach

    <!-- スクロールすると表示されるボタン -->
    <div class="page-top">
      <a class="js-create-open" href="#"><img src="images/square-plus-solid.svg" alt="編集" class="form-button form-create"></a>
    </div>

    <div class="js-create create">
        <div class="create__bg js-create-close"></div>
        <div class="create__content">
          {!! Form::open(['url' => '/post']) !!}
          {{ Form::textarea('post', null, ['class' => 'create-input', 'placeholder' => '投稿内容を入力してください。', 'style' => 'overflow: hidden;']) }}
          {!! Form::image('images/square-plus-solid.svg', 'submit', ['class' => 'create-button']) !!}
          {!! Form::close() !!}
        </div>
    </div>

 <!-- モーダルの中身(投稿編集用) -->
  <!-- モーダルの中にupdate用の記述を書く -->
  <div class="js-modal modal">
    <div class="modal__bg js-modal-close"></div>
    <div class="modal__content">
        {!! Form::open(['url' => '/posts/update']) !!}
        {{ Form::textarea('upPost', null, ['class' => 'modal_post']) }}
        <!-- $post->idと書いていたが、それのせいで取得できていたクリックされたid(modal_id)を上書きしていたために最終行のidを送っていた。 -->
        {{ Form::hidden('modal_id', null, ['class' => 'modal_id']) }}
        {!! Form::image('images/edit.png', 'submit', ['class' => 'modal-button']) !!}
        {{ csrf_field() }}
        {!! Form::close() !!}
    </div>
</div>
@endsection
