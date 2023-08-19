<?php

declare(strict_types=1);

namespace Obelaw\Framework\Console;

use Illuminate\Console\Command;
use Obelaw\Framework\Facades\Bundles;

final class MigrateCommand extends Command
{
    protected $signature = 'obelaw:migrate';

    protected $description = 'Modules setup';

    public function handle(): void
    {
        $paths = array_values(Bundles::getMigrations());

        $this->call('migrate', [
            '--path' => $paths,
        ]);
    }
}
