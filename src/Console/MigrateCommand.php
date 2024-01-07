<?php

declare(strict_types=1);

namespace Obelaw\Framework\Console;

use Illuminate\Console\Command;
use Obelaw\Facades\Bundles;

final class MigrateCommand extends Command
{
    protected $signature = 'obelaw:migrate {--action=migrate}';

    protected $description = 'Modules setup';

    public function handle(): void
    {
        $migratePath = array_values(Bundles::getMigrations());

        $action = $this->option('action');

        // migrate
        if ($action == 'migrate') {
            $this->call('migrate', [
                '--path' => $migratePath,
            ]);
        }

        // migrate:rollback
        if ($action == 'rollback') {
            $this->call('migrate:rollback', [
                '--path' => $migratePath,
            ]);
        }
    }
}
