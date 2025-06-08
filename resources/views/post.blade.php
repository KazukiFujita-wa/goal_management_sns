@extends('layout')

@section('post','投稿画面') 

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

<form action="{{ route('posts.store') }}" method="POST">
    @csrf
    <textarea name="content"></textarea>
    <button type="submit">投稿する</button>
</form>
    <p>    <a href="{{ route('posts.index') }}">ホームに戻る</a></p>
  </body>
</html>