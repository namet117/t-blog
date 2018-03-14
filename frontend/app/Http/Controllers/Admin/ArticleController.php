<?php
namespace App\Http\Controllers\Admin;

use App\Article;
use App\Http\Requests\ArticleRequest;
use Illuminate\Http\Request;

class ArticleController extends BaseController
{
    // 获取文章列表
    public function getList(Request $request, Article $article)
    {
        $page['limit'] = $request->get('limit', 10);
        $currentPage = $request->get('page', 1);
        $page['offset'] = ($currentPage - 1) * $page['limit'];

        $request_sort = $request->get('sort', 'id');
        $request_order = strtolower($request->get('order', 'asc'));
        $order[$request_sort] = !in_array($request_order, ['asc', 'desc']) ? 'desc' : $request_order;

        $where = [];
        if (($tagids = intval($request->get('tagids'))) && $tagids > 0) {
            $where['tagids'] = $tagids;
        }

        $total = $article->getArticleCount($where);
        $rows = [];
        if ($total) {
            $rows = $article->getArticleList($where, $page, $order);
        }

        return compact('total', 'rows');
    }

    // 获取单个文章内容
    public function getInfo(Request $request, Article $article)
    {
        $article->tags_array = explode(',', trim($article->tag_ids, ','));
        $article->tag_names = $article->getTagNames();
        return $article;
    }

    // 修改文章列表
    public function updateArticle(ArticleRequest $request, Article $article)
    {
        $data = $request->all();
        $data['tag_ids'] = ',' . implode(',', $data['tags']) . ',';
        $data['is_top'] = $data['is_top'] ? 1 : 0;

        $article->update($data);
    }

    // 新增文章
    public function store(ArticleRequest $request)
    {
        $data = $request->all();
        $data['tag_ids'] = ',' . implode(',', $data['tags']) . ',';
        $data['is_top'] = $data['is_top'] ? 1 : 0;

        return Article::create($data);
    }

    // 删除文章
    public function delete(Article $article)
    {
        $article->delete();

        return 1;
    }
}
