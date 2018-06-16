<?php

/**
 * Admin Routes
 */
Route::view('/', 'admin.index');

Route::post('login', 'AuthController@login');

Route::get('user/info', 'UserController@info');

Route::view('/test', 'admin.test');
