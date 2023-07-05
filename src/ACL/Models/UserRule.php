<?php

namespace Obelaw\Framework\ACL\Models;

use Obelaw\Framework\Base\ModelBase;

class UserRule extends ModelBase
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'rule_id',
    ];

    public function permission()
    {
        return $this->hasOne(Rule::class, 'id', 'rule_id');
    }
}
