<?php

declare (strict_types=1);
namespace App\Model;

/**
 * @property int $id 主键
 * @property string $title 标题
 * @property string $keywords 关键字
 * @property string $abstract 摘要
 * @property string $original_md 原始的MarkDown内容
 * @property string $content 解析后的HTML内容
 * @property string $tag_ids 标签
 * @property string $slug 标题翻译
 * @property string $first_img 首图
 * @property int $view_times 浏览次数
 * @property int $praise_times 被赞次数
 * @property int $comment_times 评论次数
 * @property int $is_top 是否置顶
 * @property int $is_hidden 是否隐藏
 * @property \Carbon\Carbon $created_at 
 * @property \Carbon\Carbon $updated_at 
 * @property string $deleted_at 
 */
class Article extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'articles';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [];
    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = ['id' => 'integer', 'view_times' => 'integer', 'praise_times' => 'integer', 'comment_times' => 'integer', 'is_top' => 'integer', 'is_hidden' => 'integer', 'created_at' => 'datetime', 'updated_at' => 'datetime'];
}