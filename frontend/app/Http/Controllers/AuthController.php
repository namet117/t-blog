<?php

namespace App\Http\Controllers;

use App\OauthUser;
use Illuminate\Http\Request;
use Namet\Socialite\OAuth;

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
//        $oauth_info = (new OAuth($name, $config))->getUserInfo();
//
//        $user_id = OauthUser::where(['uid' => $oauth_info['uid'];, 'oauth_name' => $name])->first();
        $user = OauthUser::where(['uid' => 'dsd', 'oauth_name' => 'dsads'])->first();

    }
}
