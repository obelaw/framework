<?php

namespace Obelaw\Framework\Pipeline\Bundles\Compiling\Plugin;

use Illuminate\Support\Facades\Cache;
use Obelaw\Framework\Builder\Build\Navbar\Links;

class NavbarPluginCompile
{
    public $count = 0;

    public function __construct(
        protected $cachePrefix = null,
    ) {
    }

    public function merge($paths)
    {
        $outNavbars = Cache::get($this->cachePrefix . 'obelawNavbars', []);

        foreach ($paths as $id => $path) {
            $pathNavbarFile = $path . DIRECTORY_SEPARATOR . 'etc' . DIRECTORY_SEPARATOR . 'navbar.php';

            // dd($pathNavbarFile);


            if (file_exists($pathNavbarFile)) {
                $navbar = require $pathNavbarFile;
                $navbar = new $navbar;

                $link = new Links;

                $navbar->navbar($link);

                if (property_exists($navbar, 'appendTo')) {
                    if (isset($outNavbars[$navbar->appendTo])) {
                        $outNavbars[$navbar->appendTo] = array_merge($outNavbars[$navbar->appendTo], $link->getLinks());
                    } else {
                        throw new \Exception("Error Processing Request", 1);
                    }
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
