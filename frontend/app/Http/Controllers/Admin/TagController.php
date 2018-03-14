<?php
/**
 * Created by PhpStorm.
 * User: namet
 * Date: 2018/2/27
 * Time: 11:16
 */

namespace App\Http\Controllers\Admin;


use App\Tag;
use Illuminate\Http\Request;

class TagController extends BaseController
{
    public function getTagList(Tag $tag)
    {
        $data = $tag::all();
        $list = [];
        foreach ($data as $v) {
            $list[$v['id']] = $v;
        }

        return $list;
    }

    public function addTag(Request $request, Tag $tag)
    {
        $this->validate($request, ['tag_name' => 'required']);

        $tag->tag_name = $request->tag_name;

        $tag->save();

        return $tag;
    }
}
