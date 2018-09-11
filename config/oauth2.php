<?php

return [
    // 新浪微博
    'weibo' => [
        'appid' => env('OAUTH_WEIBO_APPID'),
        'redirect_uri' => url(env('OAUTH_WEIBO_REDIRECT_URI')),
        'secret' => env('OAUTH_WEIBO_SECRET'),
        'scope' => env('OAUTH_WEIBO_SCOPE'),
    ],
    'qq' => [
        'appid' => env('OAUTH_QQ_APPID'),
        'redirect_uri' => url(env('OAUTH_QQ_REDIRECT_URI')),
        'secret' => env('OAUTH_QQ_SECRET'),
        'scope' => env('OAUTH_QQ_SCOPE'),
    ],
    'baidu' => [
        'appid' => env('OAUTH_BAIDU_APPID'),
        'redirect_uri' => url(env('OAUTH_BAIDU_REDIRECT_URI')),
        'secret' => env('OAUTH_BAIDU_SECRET'),
        'scope' => env('OAUTH_BAIDU_SCOPE'),
    ],
    'github' => [
        'appid' => env('OAUTH_GITHUB_APPID'),
        'redirect_uri' => url(env('OAUTH_GITHUB_REDIRECT_URI')),
        'secret' => env('OAUTH_GITHUB_SECRET'),
        'scope' => env('OAUTH_GITHUB_SCOPE'),
    ],
];
