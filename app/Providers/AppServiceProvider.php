<?php

namespace App\Providers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
//        \App\Article::observe(\App\Observers\ArticleObserver::class);
        \App\Comment::observe(\App\Observers\CommentObserver::class);

        \Carbon\Carbon::setLocale('zh');

//         DB::listen(function ($event) {
//             $sql = str_replace("?", "'%s'", $event->sql);
//
//             $log = vsprintf($sql, $event->bindings);
//
//             Log::info($log);
//         });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
