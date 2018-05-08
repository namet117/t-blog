<?php

return [
    'wechat' => [
        'appid' => 'wx74340ea7f92adc11',
        'redirect_uri' => env('APP_URL') . '/oauth/wechat',
        'secret' => '98ee280ac8abd65c2174fc6c4f057912',
    ],
    // 新浪微博
    'weibo' => [
        'appid' => '3798863111',
        'redirect_uri' => env('APP_URL') . '/oauth/weibo',
        'secret' => 'c3259b72fba9f5fe11d13fc4cb5e4741',
        'scope' => 'email',
    ],
    'qq' => [
        'appid' => 'dsadasdas',
        'redirect_uri' => env('APP_URL') . '/oauth/qq',
        'secret' => 'c3259b72fba9f5fe11d13fc4cb5e4741',
        'scope' => 'qq',
    ],
    'baidu' => [
        'appid' => 'Hefjzh4gjLNCjpjqbrySTwNx',
        'redirect_uri' => env('APP_URL') . '/oauth/baidu',
        'secret' => 'AqiVPBzGGsqi1NqlVsrfmDmD8WmIW93g',
    ],
    'github' => [
        'appid' => '238a1616fb979ea5d7e1',
        'redirect_uri' => env('APP_URL') . '/oauth/github',
        'secret' => 'c65a48f6bfa15afbd3166c57f4494096cc5120cc',
        'scope' => 'user:email',
    ],
];
