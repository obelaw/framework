<?php

namespace Obelaw\Permissions\Livewire\Admins;

use Obelaw\Permissions\Attributes\Access;
use Obelaw\UI\Renderer\GridRender;

#[Access('permissions_admin_index')]
class IndexAdminsComponent extends GridRender
{
    public $gridId = 'obelaw_helper_permissions_admins_index';

    protected $pretitle = 'Permissions';
    protected $title = 'Admins Listing';
}
