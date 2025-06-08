@extends('layout')

@section('title','投稿一覧') 

@section('content')

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>目標の編集</title>
</head>
<body>
  <h1>目標編集画面</h1>

  <form action="{{ route('goals.update', $goal->id) }}" method="POST">
    @csrf
    @method('PUT')

    <label>目標タイトル：</label><br>
    <input type="text" name="goal_title" value="{{ old('goal_title', $goal->goal_title) }}"><br>

    <label>目標内容：</label><br>
    <textarea name="goal_content">{{ old('goal_content', $goal->goal_content) }}</textarea><br>

    <button type="submit">更新する</button>
  </form>

  <form action="{{ route('goals.destroy', $goal->id) }}" method="POST" onsubmit="return confirm('本当に削除しますか？');">
    @csrf
    @method('DELETE')
    <button type="submit" style="color: red;">削除する</button>
  </form>

  <a href="{{ route('goals.index') }}">戻る</a>
</body>
</html>
