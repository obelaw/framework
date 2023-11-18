<?php

namespace Obelaw\Framework\ACL;

class Permission
{
    public static function verify($permission)
    {
        $permissions = static::authHavePermissions();

        return static::hasPermission($permission, $permissions);
    }

    public static function authHavePermissions()
    {
        return auth()->guard('obelaw')->user()->rule->permission->permissions;
    }

    public static function hasPermission($permission, $permissions)
    {
        if ($permissions == ['*']) {
            return true;
        }

        return (in_array($permission, $permissions)) ? true : false;
    }
}
