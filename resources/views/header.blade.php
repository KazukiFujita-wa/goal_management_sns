<header style="position: fixed; top: 0; width: 100%; background-color: #f8fafc; border-bottom: 1px solid #ccc; padding: 10px 20px; z-index: 1000;">
    <nav>
        <a href="{{ route('posts.index') }}">投稿一覧</a> |
        <a href="{{ route('pit') }}">ピット</a> |
        <a href="{{ route('goals.create') }}">目標を設定する</a> |
        <a href="{{ route('logout') }}"
            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            ログアウト
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
    </nav>
</header>
