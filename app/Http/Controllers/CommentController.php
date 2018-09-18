<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Comment $comment, Request $request)
    {
        $validator = \Validator::make($request->all(), [
            'original_md' => 'required',
            'article_id' => 'required|exists:articles,id',
        ], [
            'original_md.required' => '评论内容不可为空',
            'article_id.required' => '请不要改动页面内容！',
            'article_id.exists' => '大哥，你想给哪篇文章评论呢？！',
        ]);
        $reply_to_id = intval($request->input('reply_to', 0));
        $validator->after(function($validator) use($reply_to_id, $request) {
            if (
                $reply_to_id &&
                (Comment::where(['article_id' => $request->article_id, 'id' => $reply_to_id])->count() == 0)
            ) {
                $validator->errors()->add('reply_to', '亲，有点搞不清楚你想给谁评论诶');
            }
        });
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $data = $request->only(['original_md', 'reply_to', 'article_id']);
        $data['notification'] = $request->has('notify') ? 0 : 1;
        $data['reply_to'] = $reply_to_id;
        $data['ip'] = $request->getClientIp();
        $data['user_id'] = \Auth::id();
        $data['username'] = \Auth::user()->username;

        $comment->fill($data);
        $comment->save();

        return back()->with('success','评论成功');
    }
}
