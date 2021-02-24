<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UploadController extends Controller
{
    public function image(Request $request)
    {
        $file = $request->file('image');
        $validator = \Validator::make(
            ['image' => $file],
            ['image' => 'image']
        );

        if ($validator->fails()) {
            return \Response::json([
                'error' => '只允许上传图片'
            ]);
        }

        $folder = $request->get('module', 'images');
        $folder = in_array($folder, ['images', 'comments', 'articles']);

        $path = $file->store("/{$folder}/" . date('Ymd'), 'alioss');
        $imageUrl = \Storage::disk('alioss')->url($path);

        return \Response::json(compact('imageUrl'));
    }
}
