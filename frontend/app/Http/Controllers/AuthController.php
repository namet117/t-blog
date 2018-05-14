<?php

namespace App\Http\Controllers;

use App\OauthUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Namet\Socialite\OAuth;
use App\Services\UserService;

class AuthController extends Controller
{
    public function index()
    {
        $names = ['wechat', 'weibo', 'github', 'baidu'];
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
//        $oauth_info = $oauth->infos();
        //TODO 更新socialite包之后使用上面的方法
        $oauth_info = array_merge($oauth->getUserInfo(), ['driver' => $name]);
        service('user')->loginByOauth2($oauth_info);

        var_dump(Auth::id());
    }
}
