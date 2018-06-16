<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function info()
    {
        return [
            'name' => 'name-T',
            'roles' => [
                'admin'
            ],
            'avatar' => 'https://file.namet.xyz/images/avatar.jpg',
            'introduction' => 'This is Super Administator',
        ];
    }
}
