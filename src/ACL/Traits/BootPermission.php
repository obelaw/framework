<?php

namespace Obelaw\Framework\ACL\Traits;

use Exception;
use Obelaw\Framework\ACL\Attributes\PermissionAccess;
use Obelaw\Framework\ACL\Permission;
use ReflectionClass;

trait BootPermission
{
    public function boot()
    {
        $this->bootPermission();
    }

    public function bootPermission()
    {
        $reflection = new ReflectionClass($this);
        $reflectionPermissions = $reflection->getAttributes(PermissionAccess::class);

        if (empty($reflectionPermissions)) {
            throw new Exception('This component does not have a permission attribute');
        }

        foreach ($reflectionPermissions as $permission) {
            abort_if(!Permission::verify($permission->getArguments()[0]), 401);
        }
    }
}
