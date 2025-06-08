@extends('layout')

@section('goal_set','目標設定') 

@section('content')

<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="UTF-8">
    <title>新規投稿</title>
    <link rel="stylesheet" href="style.css">
  </head>
  <body>
    <h1>新規投稿</h1>

    <form action="{{ route('goals.store') }}" method="POST">
      @csrf
      <div>
        <label>目標タイトル</label><br>
        <input type="text" name="goal_title" maxlength="20" required>
      </div>
      <div>
        <label>投稿内容（50文字以内）</label><br>
        <textarea name="goal_content" rows="4" cols="50" maxlength="50" required></textarea>
      </div>
      <button type="submit">投稿する</button>
    </form>
    <p><a href="home.php">ホームに戻る</a></p>
  </body>
</html>