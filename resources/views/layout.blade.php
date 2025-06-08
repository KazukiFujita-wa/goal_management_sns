<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', '目標SNS')</title>
    <link rel="stylesheet" href="{{ asset('style.css') }}">

    <style>
        body {
            padding-top: 60px;
        }
    </style>
</head>
<body>
    @include('header') {{-- 共通ヘッダーを読み込む --}}

    <main class="p-4">
        @yield('content')
    </main>
</body>
</html>
