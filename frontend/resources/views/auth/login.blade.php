@extends('layouts.default')
@section('content')
<div class="container">
    <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">
            <div class="panel-heading">可使用以下方式登陆</div>
            <div class="panel-body" id="user-login">
                <a id="qq" href="#" class="qq" target="_blank"></a>
            </div>
        </div>
    </div>
</div>
<style media="screen">
#qq {
    background: url('./images/material/third-party.png') no-repeat 50px;
}
</style>
@endsection
