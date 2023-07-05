<?php

namespace Obelaw\Framework\ACL\Traits;

use Obelaw\Framework\ACL\Models\UserRule;

trait HasACL
{
    public function rule()
    {
        return $this->hasOne(UserRule::class, 'user_id', 'id');
    }
}
