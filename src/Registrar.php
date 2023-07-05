<?php

namespace Obelaw\Framework;

use Illuminate\Support\Facades\Cache;

class Registrar
{
    public static $modules = [];

    public static $forms = [];

    public static $navbars = [];

    public static $ACL = [];

    public static function module(string $id, array $info = [], array $navbar = [], array $forms = [], array $ACL = [])
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

        if (!empty($forms)) {
            static::$forms = array_merge(static::$forms, $forms);
        }

        if (!empty($navbar)) {
            static::$navbars = array_merge(static::$navbars, [$id => $navbar]);
        }

        if (!empty($ACL)) {
            static::$ACL = array_merge(static::$ACL, [$id => $ACL]);
        }
    }

    public static function setupModules()
    {
        Cache::forever('obelawModules', static::$modules);

        Cache::forever('obelawForms', static::$forms);

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
