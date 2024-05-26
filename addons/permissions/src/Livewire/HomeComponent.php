<?php

namespace Obelaw\Permissions\Livewire;

use Livewire\Component;
use Obelaw\Permissions\Attributes\Access;
use Obelaw\Permissions\Traits\BootPermission;
use Obelaw\UI\Views\Layout\DashboardLayout;

#[Access('obelaw_helper_permissions')]
class HomeComponent extends Component
{
    use BootPermission;

    public $allPermissions = false;
    public $permissions = [];

    public function render()
    {
        return view('obelaw-permissions::home')->layout(DashboardLayout::class);
    }
}
