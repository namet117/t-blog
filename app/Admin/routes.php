<?php

use Illuminate\Routing\Router;

Admin::registerAuthRoutes();

Route::group([
    'prefix'        => config('admin.route.prefix'),
    'namespace'     => config('admin.route.namespace'),
    'middleware'    => config('admin.route.middleware'),
], function (Router $router) {
    $router->post('/upload-img', 'UploadController@img')->name('admin.uploadimg');

    $router->get('/', 'HomeController@index');

    $router->resource('content/articles', 'ArticleController');
    $router->resource('content/tags', 'TagController');
    $router->resource('content/comments', 'CommentController');

    $router->resource('out/friendLink', 'FriendLinkController');

    $router->resource('users/users', 'UserController');
});

