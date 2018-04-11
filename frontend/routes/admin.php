<?php

/**
 * Admin Routes
 */
Route::prefix('v1')->namespace('Admin')->middleware(['admin'])->group(function() {
    Route::post('/login', 'IndexController@postLogin');
    Route::middleware('auth:api')->group(function() {
        // 获取文章列表
        Route::get('/article', 'ArticleController@getList');
        Route::get('/article/{article}', 'ArticleController@getInfo');
        // 修改文章详情 todo
        Route::post('/article/{article}', 'ArticleController@updateArticle');
        // 新增文章
        Route::post('/article', 'ArticleController@store');
        // 删除文章 todo why method delete is not allowed
        Route::post('/article-del/{article}', 'ArticleController@delete');
        // 获取标签列表
        Route::get('/tag', 'TagController@getTagList');
        // 新增标签
        Route::post('/tag', 'TagController@addTag');
    });
});
