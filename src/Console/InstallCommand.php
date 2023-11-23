<?php

declare(strict_types=1);

namespace Obelaw\Framework\Console;

use Illuminate\Console\Command;
use Obelaw\Facades\Bundles;

final class InstallCommand extends Command
{
    protected $signature = 'obelaw:install';

    protected $description = 'Install the system';

    public function handle(): void
    {
        $installingCommands = Bundles::getAtInstalls();

        $i = 1;
        $commandCount = count($installingCommands);
        foreach ($installingCommands as $command) {
            $this->info('installation steps [' . $commandCount . '/' . $i . ']');
            $this->call($command);

            $i++;
        }
    }
}
