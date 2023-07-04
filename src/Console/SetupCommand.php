<?php

declare(strict_types=1);

namespace Obelaw\Framework\Console;

use Illuminate\Console\Command;
use Obelaw\Framework\Registrar;

final class SetupCommand extends Command
{
    protected $signature = 'obelaw:setup';

    protected $description = 'Modules setup';

    public function handle(): void
    {
        Registrar::setupModules();

        $this->line('<fg=white;bg=blue> OBELAW </> Modules have been setup.');
        $this->line('<fg=white;bg=blue> OBELAW </> Number of modules: `' . Registrar::getCountModules() . '`.');
        $this->line('<fg=white;bg=blue> OBELAW </> Number of forms: `' . Registrar::getCountForms() . '`.');
    }
}
