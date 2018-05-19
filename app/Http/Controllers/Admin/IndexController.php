<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\UserLogin;
use Illuminate\Support\Facades\Auth;

class IndexController extends BaseController
{
    public function postLogin(UserLogin $request)
    {
        $credentials = $request->only(['username', 'password']);
        $credentials['is_admin'] = 1;
        if (Auth::once($credentials)) {
            return Auth::user();
        } else {
            return response(['message' => '用户名与密码不匹配'], 422);
        }
    }
}
