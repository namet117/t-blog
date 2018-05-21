<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="author" contect="namet117">
        <title>@section('title', 'Admin') - T-Blog</title>
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    </head>
    <body class="layui-layout-body">
        <div class="layui-layout layui-layout-admin">
            <!-- 内容主体区域 -->
            @yield('body')
        </div>
    </body>
    <script src="{{ mix('js/app.js') }}" type="text/javascript"></script>
    @yield('footer_script', '')
</html>
