<?php

namespace Obelaw\Framework\Pipeline\Bundles\Compiling;

use Illuminate\Support\Facades\Cache;
use Obelaw\Framework\Builder\Build\Navbar\Links;

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

            // dd($pathNavbarFile);


            if (file_exists($pathNavbarFile)) {
                $navbar = require $pathNavbarFile;
                $navbar = new $navbar;

                $link = new Links;

                $navbar->navbar($link);

                if (!property_exists($navbar, 'appendTo')) {
                    $outNavbars = array_merge($outNavbars, [$id => $link->getLinks()]);
                }
            }
        }

        // dd($outNavbars);

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
