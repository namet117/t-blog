<?php
namespace App\Observers;

use App\Models\Article;
use App\Lib\ParserLib;

class ArticleObserver
{
    public function saving(Article $article)
    {
        $article->content = (new ParserLib)->makeHtml($article->original_md);
        $article->abstract = mb_substr(strip_tags($article->content), 0, 200);
        if (!empty($article->tag_ids) && is_array($article->tag_ids)) {
            $tag_ids = ',' . implode(',', $article->tag_ids) . ',';
            $article->tag_ids = $tag_ids;
        }
        if (empty($article->first_img) && !empty($article->original_md)) {
            preg_match_all('/!\[file\]\((.+\.(jpg|png|jpeg|gif))\)/', $article->original_md, $urls);
            if (!empty($urls[1]) && !empty($urls[1][0])) {
                $article->first_img = $urls[1][0];
            }
        }
    }

    public function deleted(Article $article)
    {
        service('tag')->recount();
    }

    public function saved(Article $article)
    {
        service('tag')->recount();
    }
}
