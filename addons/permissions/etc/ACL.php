<?php

use Obelaw\UI\Schema\ACL\Permissions;
use Obelaw\UI\Schema\ACL\Section;

return new class
{
    public function permissions(Section $sections)
    {
        $sections->setSection(
            label: 'Admins',
            permission: 'admins',
            permissions: function (Permissions $permissions) {
                $permissions->setPermission(
                    label: 'Admin Index',
                    permission: 'permissions_admin_index',
                );
                $permissions->setPermission(
                    label: 'Admin Create',
                    permission: 'permissions_admin_create',
                );
                $permissions->setPermission(
                    label: 'Admin Update',
                    permission: 'permissions_admin_update',
                );
            },
        );

        $sections->setSection(
            label: 'Rules',
            permission: 'rules',
            permissions: function (Permissions $permissions) {
                $permissions->setPermission(
                    label: 'Rules Index',
                    permission: 'permissions_rules_index',
                );
                $permissions->setPermission(
                    label: 'Rule Create',
                    permission: 'permissions_rule_create',
                );
                $permissions->setPermission(
                    label: 'Rule Update',
                    permission: 'permissions_rule_update',
                );
                $permissions->setPermission(
                    label: 'Rule Permissions Update',
                    permission: 'permissions_rule_permissions_update',
                );
            },
        );
    }
};
