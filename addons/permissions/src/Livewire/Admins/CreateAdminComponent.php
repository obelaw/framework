<?php

namespace Obelaw\Permissions\Livewire\Admins;

use Illuminate\Support\Facades\Hash;
use Obelaw\Permissions\Attributes\Access;
use Obelaw\Permissions\Models\Admin;
use Obelaw\UI\Renderer\FormRender;

#[Access('permissions_admin_create')]
class CreateAdminComponent extends FormRender
{
    public $formId = 'obelaw_helper_permissions_admin_form';

    protected $pretitle = 'Permissions';
    protected $title = 'Create New Admin';

    public function submit()
    {
        $validateData = $this->getInputs();

        dd($validateData);

        $validateData['password'] = Hash::make($validateData['password']);

        Admin::create($validateData);

        $this->pushAlert('success', 'The admin has been created');

        return redirect()->route('obelaw.permissions.admins.index');
    }
}
