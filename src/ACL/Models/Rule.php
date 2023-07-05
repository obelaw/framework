<?php

namespace Obelaw\Framework\ACL\Models;

use Obelaw\Framework\Base\ModelBase;

class Rule extends ModelBase
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'permissions',
    ];

    protected $casts = [
        'permissions' => 'array'
    ];
}
