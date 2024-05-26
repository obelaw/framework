<?php

declare(strict_types=1);

use Obelaw\Permissions\Permission;

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
