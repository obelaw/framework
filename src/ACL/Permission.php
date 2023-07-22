<?php

namespace Obelaw\Framework\ACL;

class Permission
{
    public static function verify($permission)
    {
        abort_if(!auth()->guard('obelaw')->user()->rule, 401);

        $permissions = auth()->guard('obelaw')->user()->rule->permission->permissions;

        if ($permissions == ['*']) {
            return true;
        }

        abort_if(!in_array($permission, $permissions), 401);
    }
}
