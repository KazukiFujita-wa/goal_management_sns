<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="UTF-8">
    <title>ピット</title>
    <link rel="stylesheet" href="style.css">
  </head>
  <body>
    <h1>ピット</h1>
    <h2>{{ auth()->user()->name }}さんのプロフィール</h2>
    <p>設定した目標の数：{{ $totalGoals }}件</p>
    <p>達成した目標の数：{{ $completedGoals }}件</p>
    @foreach ($goals as $goal)
      <div class="card">
        <p><strong>{{ $goal->goal_title }}</strong></p>
        <p><strong>{{ $goal->goal_content }}</strong></p>
        <p>状態：{{ $goal->is_completed ? '達成済み' : '未達成' }}</p>
        <a href="{{ route('goals.edit', $goal->id) }}">編集</a>
        @if (!$goal->is_completed)
          <form action="{{ route('goals.complete', $goal->id) }}" method="POST" style="display:inline;">
            @csrf
            @method('PATCH')
            <button type="submit">目標達成！</button>
          </form>
        @endif
      </div>    
    @endforeach
    <a href="logout.php">ログアウト</a>
    <a href="post.php">投稿画面へ進む</a>
    <a href="mypage.php">マイページを表示する</a>
  </body>
</html>