<?php

declare (strict_types=1);
namespace App\Model;

/**
 * @property int $id ID
 * @property string $username 用户名
 * @property int $user_id 用户ID
 * @property string $ip IP
 * @property int $reply_to 回复评论的ID
 * @property int $article_id 评论的文章ID
 * @property string $original_md 原始MarkDown
 * @property string $content 评论内容
 * @property int $rank 评论楼层
 * @property int $notification 是否接收新消息通知
 * @property int $is_notified 是否已发送通知
 * @property \Carbon\Carbon $created_at 
 * @property \Carbon\Carbon $updated_at 
 * @property string $deleted_at 
 */
class Comment extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'comments';
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
    protected $casts = ['id' => 'integer', 'user_id' => 'integer', 'reply_to' => 'integer', 'article_id' => 'integer', 'rank' => 'integer', 'notification' => 'integer', 'is_notified' => 'integer', 'created_at' => 'datetime', 'updated_at' => 'datetime'];
}