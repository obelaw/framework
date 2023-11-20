<?php

declare(strict_types=1);

use Obelaw\Framework\ACL\Permission;

if (!function_exists('hasPermission')) {
    function hasPermission($permission)
    {
        $permissions = Permission::authHavePermissions();

        if ($permissions == ['*']) {
            return true;
        }

        return Permission::hasPermission($permission, $permissions);
    }
}
