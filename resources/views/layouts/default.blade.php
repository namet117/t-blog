<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="author" contect="namet117">
        <meta name="keywords" contect="@yield('keywords', 'blog'),namet117,php">
        <meta name="description" contect="@yield('desc', '') - namet117的PHP技术博客">
        <title>@yield('title', 'BLOG') - T-Blog</title>
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    </head>
    <body>
        <!-- 头部 -->
        @include('layouts._header')
        <!-- 提示信息 -->
        @include('share._msg')
        <!-- 错误信息 -->
        @include('share._errors')
        <!-- 正文 -->
        @yield('content')
        <!-- 页脚 -->
        @include('layouts._footer')
    </body>
    <script src="{{ mix('js/app.js') }}" type="text/javascript"></script>
    @yield('footer_script', '')
</html>
