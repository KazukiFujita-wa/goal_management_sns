
<!-- header.blade.php -->
<header class="site-header">
	<nav class="nav-container">
    <a href="{{ route('posts.index') }}">投稿一覧</a>
    <a href="{{ route('pit') }}">ピット</a>
    <a href="{{ route('goals.create') }}">目標を設定する</a>
    <a href="{{ route('posts.create') }}">投稿する</a>		
    <a href="{{ route('goals.create') }}">友達を増やそう</a>		
    <a href="{{ route('logout') }}"
      onclick="event.preventDefault(); document.getElementById('logout-form').submit();">ログアウト</a>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
      @csrf
    </form>
  </nav>
</header>
