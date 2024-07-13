<?php

namespace Obelaw\Permissions\Livewire\Admins;

use Obelaw\Permissions\Actions\UpdateAdminAction;
use Obelaw\Permissions\Attributes\Access;
use Obelaw\Permissions\Services\AdminService;
use Obelaw\UI\Renderer\FormActionRender;

#[Access('permissions_admin_update')]
class UpdateAdminComponent extends FormActionRender
{
    public $formId = 'obelaw_helper_permissions_admin_update_form';

    public $admin = null;

    protected $pretitle = 'Permissions';
    protected $title = 'Create Update This Admin';
    protected $actionClass = UpdateAdminAction::class;

    public function mount($adminId)
    {
        $this->admin = $admin = AdminService::make()->getAdminById($adminId);

        $this->setInputs([
            'rule_id' => $admin->rule_id,
            'name' => $admin->name,
            'email' => $admin->email,
            'status' => $admin->status,
        ]);
    }

    public function properties()
    {
        return [
            'admin' => $this->admin,
        ];
    }
}
