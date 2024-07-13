<?php

namespace Obelaw\Permissions\Livewire\Admins;

use Obelaw\Permissions\Actions\CreateAdminAction;
use Obelaw\Permissions\Attributes\Access;
use Obelaw\UI\Renderer\FormActionRender;

#[Access('permissions_admin_create')]
class CreateAdminComponent extends FormActionRender
{
    public $formId = 'obelaw_helper_permissions_admin_form';

    protected $pretitle = 'Permissions';
    protected $title = 'Create New Admin';
    protected $actionClass = CreateAdminAction::class;
}
