<?php

declare(strict_types=1);

namespace Obelaw\Framework\Console;

use Illuminate\Console\Command;
use Obelaw\Framework\Facades\Bundles;
use Obelaw\Framework\Pipeline\Bundles\BundlesSetup;

final class SetupCommand extends Command
{
    protected $signature = 'obelaw:setup';

    protected $description = 'Modules setup';

    public function handle(): void
    {
        // dd(Bundles::getCachePrefix());
        $bundlesSetup = new BundlesSetup();
        $bundlesSetup->run();
    }
}
