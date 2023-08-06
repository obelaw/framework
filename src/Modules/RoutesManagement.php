<?php

namespace Obelaw\Framework\Modules;

use Illuminate\Support\Facades\Cache;

class RoutesManagement
{
    private static $routes = [];

    private static function setRoute($id, $name, $uri, $action)
    {
        $route = [
            'id' => $id,
            'name' => 'obelaw.' . $name,
            'uri' => $uri,
            'action' => $action,
        ];

        array_push(static::$routes, $route);
    }

    private static function getRoutes()
    {
        return static::$routes;
    }

    private static function cacheRoutes($routes)
    {
        Cache::forever('obelawRoutes', $routes);
    }

    public static function manage($routes)
    {
        foreach ($routes['group'] as $prefix => $_routes) {
            foreach ($_routes as $uri => $action) {
                if (!is_array($action)) {
                    static::setRoute(
                        id: $routes['id'],
                        name: $prefix . '.' . static::handlePerma($uri),
                        uri: $prefix . '/' . $uri,
                        action: $action,
                    );
                }

                if (is_array($action)) {
                    foreach ($action as $_uri => $_action) {
                        static::setRoute(
                            id: $routes['id'],
                            name: $prefix . '.' . $uri . '.' . static::handlePerma($_uri),
                            uri: $prefix . '/' . $uri . '/' . $_uri,
                            action: $_action,
                        );
                    }
                }
            }
        }

        $collect = collect(static::getRoutes());

        $collect = $collect->groupBy('id')->toArray();

        static::cacheRoutes($collect);
    }

    public static function listRoutes()
    {
        return Cache::get('obelawRoutes', []);
    }

    public static function handlePerma($prama)
    {
        $prama = preg_replace('/{[\s\S]+?}/', '', $prama);
        $prama = str_replace('/', '', $prama);
        return $prama;
    }
}
