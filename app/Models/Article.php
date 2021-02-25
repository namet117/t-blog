<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Arr;

class Article extends Model
{
    protected $guarded = [
        'id',
    ];

    /**
     * @param array $where
     * @param array $order
     * @param array $page
     * @param array $tags
     *
     * @return mixed
     */
    public function getArticleList($where = [], $page = [], $order = [], $tags = [])
    {
        $tags = $tags ?: Tag::all()->pluck('id', 'tag_name')->toArray();

        $fields = [
            'id', 'title', 'abstract', 'tag_ids', 'first_img', 'view_times', 'praise_times', 'comment_times',
            'created_at', 'slug', 'is_top', 'keywords'
        ];

        $articles = self::select($fields);

        foreach ($where as $key => $val) {
            $function = 'with' . ucfirst($key);
            $articles->$function($val);
        }
        $page['limit'] = $page['limit'] ?? 10;
        $page['offset'] = $page['offset'] ?? 0;
        foreach ($order as $k => $v) {
            $articles->orderBy($k, $v);
        }

        $articles = $articles->where('is_hidden', 0)->offset($page['offset'])->limit($page['limit'])->get()
            ->each(function($item, $key) use($tags) {
                $tag_ids = explode(',', trim($item->tag_ids, ','));
                $this_tags = $tag_ids ? Arr::only($tags, $tag_ids) : [];
                $item->tags = $this_tags;
                $item->tag_array = $tag_ids;
            });

        return $articles;
    }

    /**
     * Get count with condition given
     *
     * @param array $where
     * @return mixed
     */
    public function getArticleCount($where = [])
    {
        $article = self::select('1');
        foreach ($where as $k => $v) {
            $function = 'with' . ucfirst($k);
            $article->$function($v);
        }

        return $article->where('is_hidden', 0)->count();
    }

    // 获取关联评论
    public function comments()
    {
        return $this->hasMany('App\Comment');
    }

    /**
     * get article list with pagination
     *
     * @param array $where
     * @param array $page
     * @param array $order
     * @param array $tags
     * @param int $currentPage
     *
     * @return array
     */
    public function getArticleListWithPage($where = [], $page = [], $order = [], $tags = [], $currentPage = 1)
    {
        $perPage = 8;
        $page = $page ?: [
            'limit' => $perPage,
            'offset' => ($currentPage - 1) * $perPage,
        ];
        $order = $order ?: [
            'is_top' => 'desc',
            'created_at' => 'desc',
        ];
        $data['list'] = $this->getArticleList($where, $page, $order, $tags);
        $data['count'] = $this->getArticleCount($where);
        $data['pagination'] = new LengthAwarePaginator($data['list'], $data['count'], $perPage, $currentPage);

        return $data;
    }

    public function scopeWithTagids($query, $val)
    {
        return $query->where('tag_ids', 'like', "%,{$val},%");
    }

    public function getTagNames()
    {
        if ($this->tag_ids) {
            $tags = Tag::all()->pluck('tag_name', 'id')->toArray();
            $tag_ids = explode(',', trim($this->tag_ids, ','));
            $this_tags = $tag_ids ? Arr::only($tags, $tag_ids) : [];

            return array_values($this_tags);
        } else {
            return [];
        }
    }
}
