<?php

namespace Obelaw\UI\Compiles\Scan\Plugins;

use Obelaw\UI\Compiles\Scan\Modules\RoutesApiCompile;

class RoutesApiPluginCompile extends RoutesApiCompile
{
    private $routes = [];

    private function setRoute($id, $path)
    {
        $route[$id] = $path;

        $this->routes = array_merge($this->driver->get('obelawApiRoutes'), $route);
    }

    private function getRoutes()
    {
        return $this->routes;
    }

    public function scanner($paths)
    {
        $this->routes = $this->driver->get('obelawApiRoutes');

        foreach ($paths as $id => $path) {
            $pathRoutesFile = $path . DIRECTORY_SEPARATOR . 'etc' . DIRECTORY_SEPARATOR . 'routes' . DIRECTORY_SEPARATOR . 'api.php';

            if (file_exists($pathRoutesFile)) {
                $this->setRoute($id, $pathRoutesFile);
            }
        }

        return $this->getRoutes();
    }
}
