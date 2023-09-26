<?php

namespace Obelaw\Framework\Pipeline\Bundles\Compiling;

use Illuminate\Support\Facades\Cache;

class InstallCommandsCompile
{
    public $count = 0;

    public function __construct(
        protected $cachePrefix = null,
    ) {
    }

    public function merge($paths)
    {
        $outAtInstall = [];

        foreach ($paths as $id => $path) {
            $pathInfoFile = $path . DIRECTORY_SEPARATOR . 'etc' . DIRECTORY_SEPARATOR . 'at-install.php';

            if (file_exists($pathInfoFile)) {
                $outAtInstall = array_merge($outAtInstall, require $pathInfoFile);
            }
        }

        return $outAtInstall;
    }

    public function cache($bundles)
    {
        Cache::forever($this->cachePrefix . 'obelawInstallCommands', $bundles);
    }

    public function manage($paths)
    {
        $atInstall = collect($this->merge($paths));
        $this->cache($atInstall->unique()->all());
        $this->count = $atInstall->unique()->count();
    }
}
