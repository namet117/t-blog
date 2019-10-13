<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FriendLink extends Model
{
    protected $fillable = [
        'name', 'link', 'ordering', 'enabled',
    ];

    public function scopeValid($query)
    {
        return $query->where('enabled', 1);
    }

    public function scopeWithOrder($query)
    {
        return $query->orderBy('ordering', 'desc');
    }
}

