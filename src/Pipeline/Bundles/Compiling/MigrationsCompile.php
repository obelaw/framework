<?php

namespace Obelaw\Framework\Pipeline\Bundles\Compiling;

use Illuminate\Support\Facades\Cache;

class MigrationsCompile
{
    public $count = 0;

    private $migrations = [];

    public function __construct(
        protected $cachePrefix = null,
    ) {
    }

    private function setMigration($id, $path)
    {
        $dir[$id] = $path;

        $this->migrations = array_merge($this->migrations, $dir);
    }

    private function getMigrations()
    {
        return $this->migrations;
    }

    private function cacheMigrations($migrations)
    {
        Cache::forever($this->cachePrefix . 'obelawMigration', $migrations);
    }

    public function manage($paths)
    {
        foreach ($paths as $id => $path) {
            $pathMigrationsFiles = $path . DIRECTORY_SEPARATOR . 'database' . DIRECTORY_SEPARATOR . 'migrations';

            if (is_dir($pathMigrationsFiles)) {
                $this->setMigration($id, $pathMigrationsFiles);
            }
        }

        $migrations = $this->getMigrations();
        $this->cacheMigrations($migrations);
        $this->count = count($migrations);
    }
}
