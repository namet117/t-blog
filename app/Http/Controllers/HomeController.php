<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tag;
use App\Message;
use App\Article;

class HomeController extends Controller
{
    public function index($tag_name = '', Request $request ,Article $article)
    {
        $tags = Tag::all();

        $messages = Message::latest()->limit(5)->get();

        $currentPage = intval($request->get('page', 1));
        $currentPage = $currentPage > 0 ? $currentPage : 1;
        $tags_name = $tags->pluck('tag_name', 'id')->toArray();

        $where = [];
        if ($tag_name && ($tag_id = array_search($tag_name, $tags_name))) {
            $where['tagids'] = $tag_id;
        }
        $data = $article->getArticleListWithPage($where, [], [], $tags_name, $currentPage);
        $articles = $data['list'];

        $page = $data['pagination'];
        return view('home.index', compact('tags', 'messages', 'articles', 'page'));
    }

    public function about()
    {
        \Auth::loginUsingId(2, true);
        return view('about.me');
    }
}
