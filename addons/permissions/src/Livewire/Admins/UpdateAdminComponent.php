<?php

namespace Obelaw\Permissions\Livewire\Admins;

use Illuminate\Support\Facades\Hash;
use Obelaw\Permissions\Attributes\Access;
use Obelaw\Permissions\Models\Admin;
use Obelaw\UI\Renderer\FormRender;

#[Access('permissions_admin_update')]
class UpdateAdminComponent extends FormRender
{
    public $formId = 'obelaw_helper_permissions_admin_update_form';

    public $admin = null;

    protected $pretitle = 'Permissions';
    protected $title = 'Create Update This Admin';

    public function mount(Admin $admin)
    {
        $this->admin = $admin;

        $this->setInputs([
            'rule_id' => $admin->rule_id,
            'name' => $admin->name,
            'email' => $admin->email,
            'status' => $admin->status,
        ]);
    }

    public function submit()
    {
        $validateData = $this->getInputs();

        if (isset($validateData['password'])) {
            $validateData['password'] = Hash::make($validateData['password']);
        } else {
            unset($validateData['password']);
        }

        $this->admin->update($validateData);

        $this->pushAlert('success', 'The admin has been updated');

        return redirect()->route('obelaw.permissions.admins.index');
    }
}
