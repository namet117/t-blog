<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;

class ArticleController extends Controller
{
    public function show(Article $article)
    {
        $fields = ['id', 'title', 'slug'];
        $next = $article::select($fields)->where('is_hidden', 0)->where('id', '>', $article->id)->limit(1)->orderBy('id', 'asc')->first();
        $prev = $article::select($fields)->where('is_hidden', 0)->where('id', '<', $article->id)->limit(1)->orderBy('id', 'desc')->first();

        $comments = $article->comments;
        $list = [];
        $replies = [];
        foreach ($comments as $comment) {
            $comment->user_info = $comment->user;
            $replies[$comment->id] = $comment;
        }

        // 如果这个用户看过此文章，则不再增加
        $key = 'has_read_' . $article->id;
        if (!session($key)) {
            $article->increment('view_times');
            session([$key => 1]);
        }

        return view('articles.show', compact('article', 'prev', 'next', 'comments', 'replies'));
    }
}
