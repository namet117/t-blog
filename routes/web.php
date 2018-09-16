<?php

// 首页
Route::get('/', 'HomeController@index')->name('home');

// 根据标签查找文章
Route::get('/tag/{tag_name}', 'HomeController@index')->name('tag.articles');

//文章明细
Route::get('/article/{article}/{slug?}', 'ArticleController@show')->name('article.show_detail');

// 个人简介
Route::get('/about', 'HomeController@about')->name('about');

// 账号相关
Route::get('login', 'AuthController@index')->name('login');
Route::post('logout', 'AuthController@logout')->name('logout');
Route::get('/oauth/{name}', 'AuthController@login')->name('oauth.login');

/* 需要登陆的功能 */
Route::middleware('auth')->group(function () {
    // 评论
    Route::resource('comment', 'CommentController', ['only' => ['store']]);

    // 图片上传
    Route::post('/upload-image', 'UploadController@imgae');
});
