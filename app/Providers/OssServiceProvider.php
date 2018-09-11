<?php
/**
 * Created by PhpStorm.
 * User: namet117<namet117@163.com>
 * DateTime: 2018/9/11 22:48
 */

namespace App\Providers;


use App\Lib\OssLib;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\ServiceProvider;
use League\Flysystem\Filesystem;

class OssServiceProvider extends ServiceProvider
{
    public function boot()
    {
        Storage::extend('oss', function ($app, $config) {
debug($config);
            $client = new OssLib([
                $config
            ]);

            return new Filesystem($client);
        });
    }
}
