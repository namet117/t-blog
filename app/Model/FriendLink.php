<?php

declare (strict_types=1);
namespace App\Model;

/**
 * @property int $id
 * @property string $name 名称
 * @property string $link 链接
 * @property int $ordering 排序
 * @property int $enabled 是否启用
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 */
class FriendLink extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'friend_links';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'link', 'ordering', 'enabled'];
    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = ['id' => 'integer', 'ordering' => 'integer', 'enabled' => 'integer', 'created_at' => 'datetime', 'updated_at' => 'datetime'];


    public function scopeValid($query)
    {
        return $query->where('enabled', 1);
    }

    public function scopeWithOrder($query)
    {
        return $query->orderBy('ordering', 'desc');
    }
}
