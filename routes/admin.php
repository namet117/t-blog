<?php

/**
 * Admin Routes
 */
Route::view('/', 'admin.index');

Route::post('login', 'AuthController@login');
