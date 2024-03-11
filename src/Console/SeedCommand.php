<?php

declare(strict_types=1);

namespace Obelaw\Framework\Console;

use Illuminate\Console\Command;

final class SeedCommand extends Command
{
    protected $signature = 'obelaw:seed';

    protected $description = 'Seed the database with records';

    public function handle(): void
    {
        // seed
        $this->call('db:seed', [
            '--class' => 'Obelaw\Framework\Seeders\DatabaseSeeder',
        ]);
    }
}
