<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OAuthController extends Controller
{
    public function redirect($name)
    {
        dd(config('wechat'));
        exit;
    }
}
