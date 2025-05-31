<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="UTF-8">
    <title>投稿一覧</title>
    <link rel="stylesheet" href="style.css">
  </head>
  <body>
    <h1>投稿一覧</h1>
    @foreach ($posts as $post)
      <div class="card">
        <p><strong>{{ $post->user->name }}</strong></p>
        <p><strong>{{ $post->content }}</strong></p>
      </div>    
    @endforeach
    <a href="logout.php">ログアウト</a>
    <a href="post.php">投稿画面へ進む</a>
    <a href="mypage.php">マイページを表示する</a>
  </body>
</html>