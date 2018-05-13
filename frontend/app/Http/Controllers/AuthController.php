<?php

namespace App\Http\Controllers;

use App\OauthUser;
use Illuminate\Http\Request;
use Namet\Socialite\OAuth;
use App\Services\UserService;

class AuthController extends Controller
{
    public function index()
    {
        $names = ['wechat', 'weibo', 'github', 'baidu', 'qq'];
        return view('auth/login', compact('names'));
    }

    public function redirect($name)
    {
        // TODO 验证是否有非法请求
        $config = config("oauth2.{$name}");
        // 跳转到认证服务器
        (new OAuth($name, $config))->authorize();
    }

    public function login($name)
    {
        // TODO 验证是否有非法请求
        $config = config("oauth2.{$name}");
        $oauth = new OAuth($name, $config);
        $oauth_info = $oauth->getUserInfo();

        $service = service('user');
        if (!$service->loginByOauth2($oauth_info['uid'], $name)) {
            $service->createUserByOauth2($oauth->infos());
        }
    }
}
