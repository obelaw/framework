<?php

namespace Obelaw\Framework;

use Illuminate\Support\Facades\Cache;

class Registrar
{
    public static $modules = [];

    public static function module(string $id, array $info = [])
    {
        $module[$id] = [];

        $module[$id]['info'] = [
            'name' => $info['name'] ?? 'Module',
            'icon' => $info['icon'] ?? 'puzzle',
            'href' => $info['href'] ?? '#',
            'description' => $info['description'] ?? null,
            'rule' => $info['rule'] ?? '*',
        ];

        static::$modules = array_merge(static::$modules, $module);
    }

    public static function setupModules()
    {
        Cache::forever('obelawModules', static::$modules);
    }

    public static function getModules()
    {
        return Cache::get('obelawModules');
    }

    public static function getListModules()
    {
        $modules = static::getModules();

        if (!$modules) {
            return null;
        }

        return array_map(function ($module) {
            return $module['info'];
        }, array_values($modules));
    }

    public static function getCountModules()
    {
        return count(static::getListModules());
    }
}
