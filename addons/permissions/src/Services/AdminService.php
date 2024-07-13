<?php

namespace Obelaw\Permissions\Services;

use Obelaw\Framework\Base\BaseService;
use Obelaw\Permissions\Models\Admin;

class AdminService extends BaseService
{
    public function createNewAdmin(array $data)
    {
        return Admin::create($data);
    }

    public function getAdminById(int $id)
    {
        return Admin::find($id);
    }

    public function updateAdminById(int $id, array $data)
    {
        $admin = Admin::find($id);
        $admin->update($data);
        return $admin;
    }
}
