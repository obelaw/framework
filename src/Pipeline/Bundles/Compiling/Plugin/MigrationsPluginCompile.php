<?php

namespace Obelaw\Framework\Pipeline\Bundles\Compiling\Plugin;

use Illuminate\Support\Facades\Cache;

class MigrationsPluginCompile
{
    public $count = 0;

    public function __construct(
        protected $cachePrefix = null,
    ) {
    }

    public function merge($paths)
    {
        $outoutMigrations = Cache::get($this->cachePrefix . 'obelawMigration', []);;

        foreach ($paths as $id => $path) {
            $pathInfoFile = $path . DIRECTORY_SEPARATOR . 'etc' . DIRECTORY_SEPARATOR . 'migrations.php';

            if (file_exists($pathInfoFile)) {
                $outoutMigrations = array_merge($outoutMigrations, require $pathInfoFile);
            }
        }

        return $outoutMigrations;
    }

    public function cache($migrations)
    {
        Cache::forever($this->cachePrefix . 'obelawMigration', $migrations);
    }

    public function manage($paths)
    {
        $migrations = $this->merge($paths);
        $this->cache($migrations);
        $this->count = count($migrations);
    }
}
