<?php

namespace Obelaw\Framework\Pipeline\Bundles\Compiling\Plugin;

use Illuminate\Support\Facades\Cache;

class PluginCompile
{
    public $count = 0;

    public function __construct(
        protected $cachePrefix = null,
    ) {
    }

    public function merge($paths)
    {
        $outPlugins = [];

        foreach ($paths as $id => $path) {
            $pathInfoFile = $path . DIRECTORY_SEPARATOR . 'etc' . DIRECTORY_SEPARATOR . 'info.php';

            if (file_exists($pathInfoFile)) {
                $outPlugins = array_merge($outPlugins, [$id => require $pathInfoFile]);
            }
        }

        return $outPlugins;
    }

    public function cache($plugins)
    {
        Cache::forever($this->cachePrefix . 'obelawPlugins', $plugins);
    }

    public function manage($paths)
    {
        $plugins = $this->merge($paths);
        $this->cache($plugins);
        $this->count = count($plugins);
    }
}
