<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Namet\Socialite\OAuth;


class AuthController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            return redirect()->route('home');
        }
        $config = array_except(config('oauth2'), ['qq']);
        $names = [];
        foreach ($config as $name => $val) {
            $names[$name] = (new OAuth($name, $val))->authorize(false);
        }

        return view('auth/login', compact('names'));
    }

    public function login($name)
    {
        // TODO 验证是否有非法请求
        $config = config("oauth2.{$name}");
        $oauth = new OAuth($name, $config);
        $oauth_info = $oauth->infos();
        service('user')->loginByOauth2($oauth_info);

        return redirect()->route('home');
    }

    public function logout()
    {
        Auth::logout();

        return redirect()->route('home');
    }
}
