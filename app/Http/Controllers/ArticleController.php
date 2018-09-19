<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;

class ArticleController extends Controller
{
    public function show(Article $article)
    {
        $fields = ['id', 'title', 'slug'];
        $next = $article::select($fields)->where('id', '>', $article->id)->limit(1)->orderBy('id', 'asc')->first();
        $prev = $article::select($fields)->where('id', '<', $article->id)->limit(1)->orderBy('id', 'desc')->first();

        $comments = $article->comments;
        $list = [];
        foreach ($comments as $comment) {
            // $temp = $comment->toArray();
            // $user = $comment->user;
            $comment->user_info = $comment->user;
            // f_log($comment->toArray());
        }
        $reply_names = $comments->pluck('username', 'id')->toArray();

        return view('articles.show', compact('article', 'prev', 'next', 'comments', 'reply_names'));
    }
}
