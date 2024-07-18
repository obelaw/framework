<?php

declare(strict_types=1);

namespace Obelaw\Framework\Console;

use Illuminate\Console\Command;
use Obelaw\Drivers\Abstracts\Driver;
use Obelaw\Drivers\CacheDriver;
use Obelaw\Facades\Bundles;
use Obelaw\Render\BundlesManagement;

final class MigrateCommand extends Command
{
    protected $signature = 'obelaw:migrate {--action=migrate}';

    protected $description = 'Modules setup';

    public function handle(): void
    {
        $driver = config('obelaw.engine.driver', CacheDriver::class);
        $driver = new $driver;

        // dd($driver);

        $bundlesManagement = Bundles::setDriver($driver);

        $migratePath = array_values($bundlesManagement->getMigrations());

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
