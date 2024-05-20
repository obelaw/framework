<?php

use Obelaw\Framework\Schema\Install\Install;
use Obelaw\Permissions\Console\AddDefaultAdminCommand;

return new class
{
    public function commands(Install $install)
    {
        $install->addCommand(AddDefaultAdminCommand::class);
    }
};
