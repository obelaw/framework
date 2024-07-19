<?php

namespace Obelaw\UI\Compiles\Scan\Plugins;

use Obelaw\UI\Compiles\Scan\Modules\MigrationsCompile;

class MigrationsPluginCompile extends MigrationsCompile
{
    public function scanner($paths)
    {
        $outoutMigrations = $this->driver->get('obelawMigration');

        foreach ($paths as $id => $path) {
            $pathInfoFile = $path . DIRECTORY_SEPARATOR . 'etc' . DIRECTORY_SEPARATOR . 'migrations.php';

            if (file_exists($pathInfoFile)) {
                $outoutMigrations = array_merge($outoutMigrations, require $pathInfoFile);
            }
        }

        return $outoutMigrations;
    }
}
