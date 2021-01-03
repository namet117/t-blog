<?php

declare (strict_types=1);
namespace App\Model;

/**
 * @property int $id 主键
 * @property string $username 用户名
 * @property string $email 邮箱
 * @property string $telephone 手机号
 * @property string $avatar 头像
 * @property string $password 密码
 * @property string $remember_token 
 * @property \Carbon\Carbon $created_at 
 * @property \Carbon\Carbon $updated_at 
 */
class User extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'users';
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