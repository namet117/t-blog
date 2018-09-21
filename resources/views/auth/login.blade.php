@extends('layouts.default')
@section('title', '登陆')
@section('content')
<div class="container">
    <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">
            <div class="panel-heading">可使用以下方式登陆</div>
            <div class="panel-body" id="user-login">
                <a class="btn btn-default" href="{{ $names['github'] }}" >
                    <img src="{{ asset('images/logo/github.png') }}" alt="">Github
                </a>
                <a class="btn btn-default" href="{{ $names['weibo'] }}" >
                    <img src="{{ asset('images/logo/weibo.png') }}" alt="">新浪微博
                </a>
                <a class="btn btn-default" href="{{ $names['qq'] }}" >
                    <img src="{{ asset('images/logo/qq.png') }}" alt="">QQ登陆
                </a>
                <a class="btn btn-default" href="{{ $names['baidu'] }}" >
                    <img src="{{ asset('images/logo/baidu.png') }}" alt="">百度
                </a>
                <a class="btn btn-default" href="{{ $names['oschina'] }}" >
                    <img src="{{ asset('images/logo/osc.png') }}" alt="">OSC开源中国
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
