<?php

declare (strict_types=1);
namespace App\Model;

/**
 * @property int $id 
 * @property string $tag_name 标签名称
 * @property int $article_num 文章数
 * @property \Carbon\Carbon $created_at 
 * @property \Carbon\Carbon $updated_at 
 * @property string $deleted_at 
 */
class Tag extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'tags';
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
    protected $casts = ['id' => 'integer', 'article_num' => 'integer', 'created_at' => 'datetime', 'updated_at' => 'datetime'];
}