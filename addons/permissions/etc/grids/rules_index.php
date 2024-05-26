<?php

use Obelaw\Permissions\Models\Rule;
use Obelaw\UI\Schema\Grid\Button;
use Obelaw\UI\Schema\Grid\Button\RouteAction;
use Obelaw\UI\Schema\Grid\CTA;
use Obelaw\UI\Schema\Grid\Table;

return new class
{
    public $model = Rule::class;

    public function createButton(Button $button)
    {
        $button->setButton(
            label: 'Create new rule',
            route: 'obelaw.permissions.rules.create',
            permission: 'permissions_rule_create'
        );
    }

    public function table(Table $table)
    {
        $table->setColumn('Name', 'name');
    }

    public function CTA(CTA $CTA)
    {
        $CTA->setCall('Update', new RouteAction(
            href: 'obelaw.permissions.rules.update',
            permission: 'permissions_rule_update',
        ));

        $CTA->setCall('Permissions', new RouteAction(
            href: 'obelaw.permissions.rules.permissions',
            permission: 'permissions_rule_permissions_update',
        ));
    }
};
