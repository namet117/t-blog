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
        $replies = [];
        foreach ($comments as $comment) {
            $comment->user_info = $comment->user;
            $replies[$comment->id] = $comment;
        }

        return view('articles.show', compact('article', 'prev', 'next', 'comments', 'replies'));
    }
}
