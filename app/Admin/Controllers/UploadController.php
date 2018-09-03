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
        $path = $request->file('image')->store('/' . date('Ymd'), 'public');
        return ['url' => Storage::disk('public')->url($path)];
    }
}