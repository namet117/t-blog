<?php
/**
 * Author: namet117<namet117@163.com>
 * DateTime: 2018/9/3 18:58
 */

namespace App\Services;


use App\Article;
use App\Tag;

class TagService extends BaseService
{
    private $_tag;
    private $_article;

    public function __construct(Tag $tag, Article $article)
    {
        $this->_tag = $tag;
        $this->_article = $article;
    }

    /**
     * 重新计算标签下的文章数
     *
     * @return bool
     */
    public function recount()
    {
        $tags = $this->_tag->all();

        foreach ($tags as $tag) {
            $count = $this->_article->where('tag_ids', 'like', '%,' . $tag->id . ',%')->count();
            if ($count != $tag->article_num) {
                $tag->article_num = $count;
                $tag->save();
            }
        }

        return true;
    }
}