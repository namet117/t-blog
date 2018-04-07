<?php

// 首页
Route::get('/', 'HomeController@index')->name('home');

// 根据标签查找文章
Route::get('/tag/{tag_name}', 'HomeController@index')->name('tag.articles');

//文章明细
Route::get('/article/{article}/{slug?}', 'ArticleController@show')->name('article.show_detail');

// 个人简介
Route::get('/about', 'HomeController@about')->name('about');

// 评论
Route::resource('comment', 'CommentController', ['only' => ['store'],]);
