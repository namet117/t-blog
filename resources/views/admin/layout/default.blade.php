<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="author" contect="namet117">
        <title>@yield('title', 'Admin') - T-Blog</title>
        <link rel="stylesheet" href="{{ mix('css/admin.css') }}">
        <script src="{{ mix('js/admin.js') }}" type="text/javascript"></script>
    </head>
    <body class="layui-layout-body">
        @yield('content')
    </body>
    @yield('footer_script', '')
</html>
