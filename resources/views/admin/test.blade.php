<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="X-CSRF-TOKEN" content="{{csrf_token()}}">
        <title>Dashboard - Admin</title>
    </head>
    <body>
        {{$html}}
        <div id="app"></div>
    </body>
    <script src="{{ mix('js/admin.js') }}"></script>
</html>
