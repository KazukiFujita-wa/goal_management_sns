@extends('layout')

@section('title','投稿一覧') 

@section('content')

<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="UTF-8">
    <title>ピット</title>
    <link rel="stylesheet" href="style.css">
  </head>
  <body>
    <h1>ピット</h1>
    <h2>{{ auth()->user()->name }}さんの目標一覧</h2>
    <p>設定した目標の数：{{ $totalGoals }}件</p>
    <p>達成した目標の数：{{ $completedGoals }}件</p>
    @foreach ($goals as $goal)
      <div class="card">
        <p><strong>{{ $goal->goal_title }}</strong></p>
        <p><strong>{{ $goal->goal_content }}</strong></p>
        <p>状態：{{ $goal->is_completed ? '達成済み' : '未達成' }}</p>
        <div class="btn-area">
          <a href="{{ route('goals.edit', $goal->id) }}" class="btn">編集</a>
          @if (!$goal->is_completed)
            <!-- <form action="{{ route('goals.complete', $goal->id) }}" method="POST"> -->
            <form action="{{ route('goals.complete', $goal->id) }}" method="POST" class="inline-form">
              @csrf
                @if (!$goal->is_completed)
                    <button type="submit" class="btn btn-success" action="goals.complete">達成する</button>
                @else
                    <span class="text-muted">達成済み</span>
              @endif
            </form>
            @endif
          </div>
      </div>    
    @endforeach
  </body>
</html>