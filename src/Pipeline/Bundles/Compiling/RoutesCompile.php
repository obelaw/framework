<?php

namespace Obelaw\Framework\Pipeline\Bundles\Compiling;

use Illuminate\Support\Facades\Cache;

class RoutesCompile
{
    public $count = 0;

    private $routes = [];

    public function __construct(
        protected $cachePrefix = null,
    ) {
    }

    private function setRoute($id, $path)
    {
        $route[$id] = $path;

        $this->routes = array_merge($this->routes, $route);
    }

    private function getRoutes()
    {
        return $this->routes;
    }

    private function cacheRoutes($routes)
    {
        Cache::forever($this->cachePrefix . 'obelawRoutes', $routes);
    }

    public function manage($paths)
    {
        foreach ($paths as $id => $path) {
            $pathRoutesFile = $path . DIRECTORY_SEPARATOR . 'etc' . DIRECTORY_SEPARATOR . 'routes.php';

            if (file_exists($pathRoutesFile)) {
                $this->setRoute($id, $pathRoutesFile);
            }
        }

        $routes = $this->getRoutes();
        $this->cacheRoutes($routes);
        $this->count = count($routes);
    }
}
