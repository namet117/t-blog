<?php
namespace App\Observers;

use App\Article;
use App\Lib\ParserLib;

class ArticleObserver
{
    public function saving(Article $article)
    {
        $article->content = (new ParserLib)->makeHtml($article->original_md);
        $article->abstract = mb_substr(strip_tags($article->content), 0, 200);
    }

    // public function saved()
    // {
    //
    // }

    public function deleted(Article $article)
    {
        if ($article->tag_ids) {
            $tag_ids = explode(',', trim($article->tag_ids, ','));
            // 文章数 -1
            \DB::table('tags')->whereIn('id', $tag_ids)->decrement('article_num', 1);
        }
    }

    public function created(Article $article)
    {
        if ($article->tag_ids) {
            $tag_ids = explode(',', trim($article->tag_ids, ','));

            // 文章数 +1
            \DB::table('tags')->whereIn('id', $tag_ids)->increment('article_num', 1);
        }
    }
}
