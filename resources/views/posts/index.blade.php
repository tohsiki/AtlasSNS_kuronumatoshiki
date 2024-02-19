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
         {!! Form::image('images/post.png', 'submit', ['class' => 'submit-button']) !!}

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
          <div>
            <!-- ユーザー名と投稿日時を表示する -->
            <div class="post-name">{{$post->user->username }}</div>
              <div>{{ $post->created_at->format('Y-m-d H:i')  }}</div>
          </div>
          <!-- 投稿内容を表示する -->
            <div>{!! nl2br(htmlspecialchars($post->post)) !!}</div>
                <!-- 投稿を編集するモーダルを表示させるボタンも別のif文を用意して書く -->
            <div class="index-button">
              @if (Auth::user()->id == $post->user_id)
                <div class="update-button">
                  <a class="js-modal-open upbutton" href="" post="{{ $post->post }}" post_id="{{ $post->id }}"><img src="images/edit.png" alt="編集" class="form-button form-edit"></a>
                </div>
              @endif
              @if (Auth::user()->id == $post->user_id)
                    <!-- 最初に表示させておくボタン-->
                    <div class="trash-button">
                      <!-- 投稿の削除ボタン -->
                      <p class="button"><a class="trash" href="/posts/{{$post->id}}/delete" onclick="return confirm('この投稿を削除します。よろしいでしょうか？')" method="get"><img src="/images/trash.png" width="30" height="30" alt="削除ボタン"></a></p>
                    </div>
                {{ Form::close() }}
              @endif
            </div>
          </div>
      </li>
    </ul>
  </div>

  @endforeach
 <!-- モーダルの中身 -->
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
