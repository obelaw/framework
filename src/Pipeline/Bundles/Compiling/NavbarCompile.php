<?php

namespace Obelaw\Framework\Pipeline\Bundles\Compiling;

use Illuminate\Support\Facades\Cache;

class NavbarCompile
{
    public $count = 0;

    public function __construct(
        protected $cachePrefix = null,
    ) {
    }

    public function merge($paths)
    {
        $outNavbars = [];

        foreach ($paths as $id => $path) {
            $pathNavbarFile = $path . DIRECTORY_SEPARATOR . 'etc' . DIRECTORY_SEPARATOR . 'navbar.php';


            if (file_exists($pathNavbarFile)) {
                $outNavbars = array_merge($outNavbars, [$id => require $pathNavbarFile]);
            }
        }

        return $outNavbars;
    }

    public function cache($navbars)
    {
        Cache::forever($this->cachePrefix . 'obelawNavbars', $navbars);
    }

    public function manage($paths)
    {
        $navbars = $this->merge($paths);
        $this->cache($navbars);
        $this->count = count($navbars);
    }
}