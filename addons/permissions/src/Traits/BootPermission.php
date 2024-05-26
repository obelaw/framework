<?php

namespace Obelaw\Permissions\Traits;

use Exception;
use Obelaw\Permissions\Attributes\Access;
use Obelaw\Permissions\Permission;
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
        $reflectionPermissions = $reflection->getAttributes(Access::class);

        if (empty($reflectionPermissions)) {
            throw new Exception('This component does not have a permission attribute');
        }

        foreach ($reflectionPermissions as $permission) {
            abort_if(!Permission::verify($permission->getArguments()[0]), 401);
        }
    }
}
