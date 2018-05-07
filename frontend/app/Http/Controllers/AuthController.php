<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function index()
    {
        $names = ['wechat', 'weibo', 'github', 'baidu', 'qq'];
        return view('auth/login', compact('name'));
    }
}
