<?php

namespace Obelaw\Framework\ACL\Traits;

use Obelaw\Framework\ACL\Models\AdminRule;

trait HasACL
{
    public function rule()
    {
        return $this->hasOne(AdminRule::class, 'admin_id', 'id');
    }
}
