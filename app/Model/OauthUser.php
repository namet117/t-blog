<?php

declare (strict_types=1);
namespace App\Model;

/**
 * @property int $id 
 * @property int $user_id 用户id
 * @property string $oauth_name 认证服务器名称
 * @property string $uid 唯一id
 * @property string $uname 昵称
 * @property string $avatar 头像url
 * @property string $access_token Access_token
 * @property int $expire_time access_token过期时间
 * @property string $refresh_token 刷新token
 * @property string $extends 扩展信息json化
 * @property \Carbon\Carbon $created_at 
 * @property \Carbon\Carbon $updated_at 
 * @property string $deleted_at 
 */
class OauthUser extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'oauth_users';
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
    protected $casts = ['id' => 'integer', 'user_id' => 'integer', 'expire_time' => 'integer', 'created_at' => 'datetime', 'updated_at' => 'datetime'];
}