<?php

use Obelaw\Schema\ModuleInfo;

return new class
{
    public function setInfo(ModuleInfo $module)
    {
        $module->info(
            name: 'Permissions',
            icon: 'vendor/obelaw/icons/permissions.svg',
            href: 'obelaw.permissions.home',
            group: 'helper_modules',
        );
    }
};
