<?php

namespace Obelaw\Framework\ACL;

class Permission
{
    public static function verify($permission)
    {
        abort_if(!auth()->check(), 404);

        abort_if(!auth()->user()->rule, 401);

        $permissions = auth()->user()->rule->permission->permissions;

        abort_if(!in_array($permission, $permissions), 401);
    }
}
