<?php

namespace Obelaw\Permissions\Actions;

use Illuminate\Support\Facades\Hash;
use Obelaw\Permissions\Services\AdminService;
use Obelaw\UI\Utils\Actions\FormAction;

class UpdateAdminAction extends FormAction
{
    public function handle($inputs)
    {
        if (isset($inputs['password'])) {
            $inputs['password'] = Hash::make($inputs['password']);
        } else {
            unset($inputs['password']);
        }

        AdminService::make()->updateAdminById($this->getProperties('admin')->id, $inputs);
    }
}
