@extends('layout')

@section('title','投稿一覧') 

@section('content')
  <body>
    <h1>投稿一覧</h1>
    @foreach ($posts as $post)
      <div class="card">
        <p><strong>{{ $post->user->name }}</strong></p>
        <p><strong>{{ $post->content }}</strong></p>
        <p></p>投稿日：{{ $post->created_at->format('Y年m月d日 H:i') }}</p>
      </div>    
    @endforeach
  </body>
</html>

@endsection
