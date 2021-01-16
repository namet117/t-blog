<?php

declare(strict_types=1);
/**
 * This file is part of Hyperf.
 *
 * @link     https://www.hyperf.io
 * @document https://hyperf.wiki
 * @contact  group@hyperf.io
 * @license  https://github.com/hyperf/hyperf/blob/master/LICENSE
 */
use Hyperf\HttpServer\Router\Router;

// 首页
Router::get('/', 'App\Controller\IndexController@index');

// 根据标签查找文章
Router::get('/tag/{tag_name}', 'App\Controller\IndexController@index');

//文章明细
Router::get('/article/{article}/{slug?}', 'App\Controller\ArticleController@show');

// 个人简介
Router::get('/about', 'App\Controller\UserController@about');

// 账号相关
Router::get('login', 'App\Controller\AuthController@index');
Router::post('logout', 'App\Controller\AuthController@logout');
Router::get('/oauth/{name}', 'App\Controller\AuthController@login');

/* 需要登录的功能 */
// Router::middleware('auth')->group(function () {
//     // 评论
//     Router::resource('comment', 'CommentController', ['only' => ['store']]);
//
//     // 图片上传
//     Router::post('/upload-image', 'UploadController@imgae');
// });
