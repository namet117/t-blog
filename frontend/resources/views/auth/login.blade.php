@extends('layouts.default')
@section('content')
<div class="container">
    <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">
            <div class="panel-heading">可使用以下方式登陆</div>
            <div class="panel-body" id="user-login">
                @foreach($names as $name)
                {{$name}}
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
