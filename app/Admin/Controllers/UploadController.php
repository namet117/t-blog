<?php
/**
 * Author: namet117<namet117@163.com>
 * DateTime: 2018/9/3 16:09
 */

namespace App\Admin\Controllers;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UploadController extends Controller
{
    public function img(Request $request)
    {
file_put_contents('l1.log', print_r((array)$request->files, true) . "\n", FILE_APPEND);
//return ['url' => 'https://file.namet.xyz/images/20180904/abcdefg-min.jpg'];
        $path = $request->file('image')->store('/' . date('Ymd'), 'admin');

        return ['url' => Storage::disk('admin')->url($path)];
    }
}
