<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
        <meta name="author" content="{{ config('tblog.author') }}">
        <meta name="keywords" content="@yield('keywords', 'blog'),{{ config('tblog.author') }},php">
        <meta name="description" content="@yield('desc', '') - {{ config('tblog.author') }}的技术博客">
        <title>@yield('title', 'BLOG') - {{ config('app_name') }}</title>
        <link rel="stylesheet" href="css/app.css">
    </head>
    <body>
        <!-- 头部 -->
        @include('layouts._header')
        <!-- 正文 -->
        @yield('content')
        <!-- 页脚 -->
        @include('layouts._footer')
    </body>
    <script src="js/app.js" type="text/javascript"></script>
    @yield('footer_script', '')
</html>
