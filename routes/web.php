<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// 首页
Route::get('/', 'App\Http\Controllers\HomeController@index')->name('home');

// 根据标签查找文章
Route::get('/tag/{tag_name}', 'App\Http\Controllers\HomeController@index')->name('tag.articles');

//文章明细
Route::get('/article/{article}/{slug?}', 'App\Http\Controllers\ArticleController@show')->name('article.show_detail');

// 个人简介
Route::get('/about', 'App\Http\Controllers\HomeController@about')->name('about');

// 账号相关
Route::get('login', 'App\Http\Controllers\AuthController@index')->name('login');
Route::post('logout', 'App\Http\Controllers\AuthController@logout')->name('logout');
Route::get('/oauth/{name}', 'App\Http\Controllers\AuthController@login')->name('oauth.login');

/* 需要登录的功能 */
Route::middleware('auth')->group(function () {
    // 评论
    Route::resource('comment', 'App\Http\Controllers\CommentController', ['only' => ['store']]);

    // 图片上传
    Route::post('/upload-image', 'App\Http\Controllers\UploadController@imgae');
});
