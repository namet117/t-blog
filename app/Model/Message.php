<?php

declare (strict_types=1);
namespace App\Model;

/**
 * @property int $id 
 * @property string $nickname 用户名
 * @property string $site 站点
 * @property string $content 内容
 * @property string $ip IP地址
 * @property string $ip_location IP地理位置
 * @property \Carbon\Carbon $created_at 
 * @property \Carbon\Carbon $updated_at 
 * @property string $deleted_at 
 */
class Message extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'messages';
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
    protected $casts = ['id' => 'integer', 'created_at' => 'datetime', 'updated_at' => 'datetime'];
}