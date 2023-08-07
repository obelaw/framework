<?php

namespace Obelaw\Framework;

use Illuminate\Support\Facades\Cache;
use Obelaw\Framework\Modules\FormsManagement;
use Obelaw\Framework\Modules\GridsManagement;
use Obelaw\Framework\Modules\RoutesManagement;

class Registrar
{
    public static $modules = [];

    public static $forms = [];

    public static $navbars = [];

    public static $routes = [];

    public static $ACL = [];

    public static function module(string $id, string $root, array $info = [], array $navbar = [], array $routes = [], array $ACL = [])
    {
        $module[$id] = [];

        $module[$id]['root'] = $root . DIRECTORY_SEPARATOR . 'etc';

        $module[$id]['info'] = [
            'name' => $info['name'] ?? 'Module',
            'icon' => $info['icon'] ?? 'puzzle',
            'href' => $info['href'] ?? '#',
            'slug' => $info['slug'] ?? $id,
            'description' => $info['description'] ?? null,
            'rule' => $info['rule'] ?? '*',
        ];

        static::$modules = array_merge(static::$modules, $module);

        if (!empty($navbar)) {
            static::$navbars = array_merge(static::$navbars, [$id => $navbar]);
        }

        if (!empty($routes)) {
            static::$routes = array_merge(static::$routes, [
                'id' => $id,
                'group' => [$module[$id]['info']['slug'] => $routes],
            ]);
        }

        if (!empty($ACL)) {
            static::$ACL = array_merge(static::$ACL, [$id => $ACL]);
        }
    }

    public static function setupModules()
    {
        FormsManagement::manage(static::$modules);

        GridsManagement::manage(static::$modules);

        RoutesManagement::manage(static::$routes);

        Cache::forever('obelawModules', static::$modules);

        Cache::forever('obelawNavbars', static::$navbars);

        Cache::forever('obelawACL', static::$ACL);
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

    public static function getForms($id = null)
    {
        $forms = Cache::get('obelawForms');

        if ($id) {
            return $forms[$id];
        }

        return $forms;
    }

    public static function getCountForms()
    {
        return count(static::getForms());
    }

    public static function getNavbars($id = null)
    {
        $navbars = Cache::get('obelawNavbars');

        if ($id) {
            return $navbars[$id];
        }

        return $navbars;
    }

    public static function getCountNavbar()
    {
        return count(static::getNavbars());
    }

    public static function getACL($id = null)
    {
        $ACL = Cache::get('obelawACL');

        if ($id) {
            return $ACL[$id];
        }

        return $ACL;
    }

    public static function getCountACL()
    {
        return count(static::getACL());
    }
}
