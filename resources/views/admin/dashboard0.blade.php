@extends('admin.layout.default')
@section('title', 'Dashboard')

@section('content')
<div class="layui-layout layui-layout-admin">
    <!-- 头部 -->
    <div class="layui-header">
        <div class="layui-logo">T-BLOG</div>
        <ul class="layui-nav layui-layout-left">
            <li class="layui-nav-item"><a href="">控制台</a></li>
            <li class="layui-nav-item">
                <a href="javascript:;">下拉菜单</a>
                <dl class="layui-nav-child">
                    <dd><a href="">邮件管理</a></dd>
                    <dd><a href="">消息管理</a></dd>
                    <dd><a href="">授权管理</a></dd>
                </dl>
            </li>
        </ul>
        <ul class="layui-nav layui-layout-right">
            <li class="layui-nav-item">
                <a href="javascript:;">
                    <img src="http://t.cn/RCzsdCq" class="layui-nav-img">
                    {{ Auth::user() ?? 'None' }}
                </a>
                <dl class="layui-nav-child">
                    <dd><a href="">基本资料</a></dd>
                    <dd><a href="">安全设置</a></dd>
                </dl>
            </li>
            <li class="layui-nav-item">
                <a href="{{ route('admin.dashboard') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                    退了
                </a>
                <form id="logout-form" action="{{ route('admin.dashboard') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
            </li>
        </ul>
    </div>
    <!-- 左侧菜单栏 -->
    <div class="layui-side layui-bg-black">
        <div class="layui-side-scroll">
            <ul class="layui-nav layui-nav-tree"  lay-filter="left-menu">
                <li class="layui-nav-item layui-nav-itemed">
                    <a class="" href="javascript:;"><i class="layui-icon" style="margin-right: 5px">&#xe620;</i>系统管理</a>
                    <dl class="layui-nav-child">
                        <dd id="S001" name="{{ route('admin.dashboard') }}"><a href="javascript:;">网站配置</a></dd>
                    </dl>
                </li>
                <li class="layui-nav-item">
                    <a href="javascript:;"><i class="layui-icon" style="margin-right: 5px">&#xe612;</i>用户管理</a>
                    <dl class="layui-nav-child">
                        <dd id="S002" name="{{ route('admin.dashboard') }}"><a href="javascript:;">用户列表</a></dd>
                        <dd id="S003" name="{{ route('admin.dashboard') }}"><a href="javascript:;">角色</a></dd>
                        <dd id="S004" name="{{ route('admin.dashboard') }}"><a href="javascript:;">权限</a></dd>
                    </dl>
                </li>
                <li class="layui-nav-item">
                    <a href="javascript:;">一级菜单</a>
                    <dl class="layui-nav-child">
                        <dd><a href="javascript:;">菜单项</a></dd>
                        <dd><a href="javascript:;">菜单项</a></dd>
                        <dd><a href="">菜单项</a></dd>
                    </dl>
                </li>
                <li class="layui-nav-item">
                    <a href="javascript:;">一级菜单</a>
                    <dl class="layui-nav-child">
                        <dd><a href="javascript:;">菜单项</a></dd>
                        <dd><a href="javascript:;">菜单项</a></dd>
                        <dd><a href="">菜单项</a></dd>
                    </dl>
                </li>
            </ul>
        </div>
    </div>

    <!-- Dashboard Body -->
    <div class="layui-body">
        <div class="layui-tab" lay-allowClose="true" lay-filter="tab-switch">
            <ul class="layui-tab-title">
                <li class="layui-this" >后台首页</li>
            </ul>
            <div class="layui-tab-content">
                <div class="layui-tab-item layui-show">

                    <blockquote class="layui-elem-quote layui-text">
                        服务器环境
                    </blockquote>

                    @foreach($envs as $env)
                    <div class="layui-form-item">
                        <label class="layui-form-label">{{$env['name']}}</label>
                        <div class="layui-input-block">
                            <input type="text" name="title" required  lay-verify="required"  class="layui-input" value="{{$env['value']}}">
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <!-- 底部固定区域 -->
    <div class="layui-footer">
        ©<a href="https://namet.xyz" class="layui-btn layui-btn-xs" style="margin-left: 30px;">name-T</a> - T-BLOG
    </div>
</div>

@endsection
