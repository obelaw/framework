<?php

namespace Obelaw\Permissions\Actions;

use Illuminate\Support\Facades\Hash;
use Obelaw\Permissions\Services\AdminService;
use Obelaw\UI\Utils\Actions\FormAction;

class CreateAdminAction extends FormAction
{
    public function handle($inputs)
    {
        $inputs['password'] = Hash::make($inputs['password']);

        $admin = AdminService::make()->createNewAdmin($inputs);

        return redirect()->route('obelaw.permissions.admins.update', [$admin->id]);
    }
}
