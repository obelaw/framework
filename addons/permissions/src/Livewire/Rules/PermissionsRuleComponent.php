<?php

namespace Obelaw\Permissions\Livewire\Rules;

use Livewire\Component;
use Obelaw\Facades\Bundles;
use Obelaw\Framework\Base\Traits\PushAlert;
use Obelaw\Permissions\Attributes\Access;
use Obelaw\Permissions\Models\Rule;
use Obelaw\Permissions\Traits\BootPermission;
use Obelaw\UI\Views\Layout\DashboardLayout;

#[Access('permissions_rule_permissions_update')]
class PermissionsRuleComponent extends Component
{
    use BootPermission;
    use PushAlert;

    public $rule = null;
    public $allPermissions = false;
    public $permissions = [];

    public function mount(Rule $rule)
    {
        $this->rule = $rule;

        $this->permissions = $rule->permissions;
    }

    public function render()
    {
        return view('obelaw-permissions::rules.permissions', [
            'ACls' => Bundles::getACls(),
        ])->layout(DashboardLayout::class);
    }

    public function submit()
    {
        $this->rule->update([
            'permissions' => $this->permissions,
        ]);

        $this->pushAlert('success', 'The permissions has been update');
    }
}
