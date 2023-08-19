<?php

namespace Obelaw\Framework\Modules;

use Illuminate\Support\Facades\Cache;

class RoutesManagement
{
    private static $routes = [];

    private static function setRoute($id, $path)
    {
        $route[$id] = $path;

        static::$routes = array_merge(static::$routes, $route);
    }

    private static function getRoutes()
    {
        return static::$routes;
    }

    private static function cacheRoutes($routes)
    {
        Cache::forever('obelawRoutes', $routes);
    }

    public static function manage($modules)
    {
        foreach ($modules as $id => $module) {
            $pathRoutesFile = $module['root'] . DIRECTORY_SEPARATOR . 'routes.php';

            if (file_exists($pathRoutesFile)) {
                static::setRoute($id, $pathRoutesFile);
            }
        }

        static::cacheRoutes(static::getRoutes());
    }

    public static function listRoutes()
    {
        return Cache::get('obelawRoutes', []);
    }
}
