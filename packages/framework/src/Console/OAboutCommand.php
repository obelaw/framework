<?php

declare(strict_types=1);

namespace Obelaw\Framework\Console;

use Illuminate\Console\Command;

final class OAboutCommand extends Command
{
    protected $signature = 'obelaw:about';

    protected $description = 'Modules setup';

    public function handle(): void
    {
        $this->call('about', [
            '--only' => 'Obelaw Environment',
        ]);
    }
}
