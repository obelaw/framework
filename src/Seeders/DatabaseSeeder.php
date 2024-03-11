<?php

namespace Obelaw\Framework\Seeders;

use Illuminate\Database\Seeder;
use Obelaw\Facades\Bundles;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeders.
     */
    public function run(): void
    {
        $this->call(Bundles::getSeeds());
    }
}
