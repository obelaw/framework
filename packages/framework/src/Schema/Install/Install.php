<?php

namespace Obelaw\Framework\Schema\Install;

use Exception;
use Illuminate\Console\Command;

final class Install
{
    private $commands = [];
    private $setBundleId = null;

    public function addCommand($command)
    {
        if (!is_subclass_of($command, Command::class))
            throw new Exception('Must be `' . $command . '` extends of `' . Command::class . '` in bundle ' . $this->getBundleId());

        array_push($this->commands, $command);
    }

    public function getCommands()
    {
        return $this->commands;
    }

    public function setBundleId($id)
    {
        $this->setBundleId = $id;
    }

    public function getBundleId()
    {
        return $this->setBundleId;
    }
}
