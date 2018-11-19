<?php
/**
 * Author: namet117<namet117@163.com>
 * DateTime: 2018/9/3 16:09
 */

namespace App\Admin\Controllers;


use App\Http\Controllers\Controller;
use App\Http\Requests\UploadImageRequest;
use Illuminate\Support\Facades\Storage;

class UploadController extends Controller
{
    public function img(UploadImageRequest $request)
    {
        $file = $request->file('image');
        $path = $file->store('/images/' . date('Ymd'), 'admin');
        return ['url' => Storage::disk('admin')->url($path), 'path' => $path];
    }
}
