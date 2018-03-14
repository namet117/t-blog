<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>@yield('title', 'BLOG') - WANGERGOU</title>
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    </head>
    <body>
        <!-- 头部 -->
        @include('layouts._header')
        <!-- 提示信息 -->
        @include('share._msg')

        <!-- 正文 -->
        @yield('content')

        <!-- 页脚 -->
        @include('layouts._footer')
    </body>


    <script src="{{ mix('js/app.js') }}" type="text/javascript"></script>
</html>
