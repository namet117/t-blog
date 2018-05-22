@extends('layouts.default')
@section('title', '登陆')
@section('content')
<div class="container">
    <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">
            <div class="panel-heading">可使用以下方式登陆</div>
            <div class="panel-body" id="user-login">
                @foreach($names as $name => $href)
                <a class="btn btn-default" href="{{ $href }}" >{{ $name  }}</a>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
