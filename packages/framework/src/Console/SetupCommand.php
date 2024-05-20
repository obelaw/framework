<?php

declare(strict_types=1);

namespace Obelaw\Framework\Console;

use Illuminate\Console\Command;
use Obelaw\Facades\Bundles;

final class SetupCommand extends Command
{
    protected $signature = 'obelaw:setup';

    protected $description = 'Modules setup';

    public function handle(): void
    {
        Bundles::setup();
        $this->info('All modules and plugins have been configured.');
    }
}
