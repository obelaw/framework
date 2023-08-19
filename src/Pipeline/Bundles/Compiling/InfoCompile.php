<?php

namespace Obelaw\Framework\Pipeline\Bundles\Compiling;

use Illuminate\Support\Facades\Cache;

class InfoCompile
{
    public $count = 0;

    public function __construct(
        protected $cachePrefix = null,
        protected $actives = null
    ) {
    }

    public function merge($paths)
    {
        $outBundles = [];

        foreach ($paths as $id => $path) {
            //
            if (is_array($this->actives) && !in_array($id, $this->actives)) {
                continue;
            }

            $pathInfoFile = $path . DIRECTORY_SEPARATOR . 'etc' . DIRECTORY_SEPARATOR . 'info.php';

            if (file_exists($pathInfoFile)) {
                $outBundles = array_merge($outBundles, [$id => require $pathInfoFile]);
            }
        }

        return $outBundles;
    }

    public function cache($bundles)
    {
        Cache::forever($this->cachePrefix . 'obelawModules', $bundles);
    }

    public function manage($paths)
    {
        $bundles = $this->merge($paths);
        $this->cache($bundles);
        $this->count = count($bundles);
    }
}
