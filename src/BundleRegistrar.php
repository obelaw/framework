<?php

namespace Obelaw\Framework;

class BundleRegistrar
{
    const MODULE = 'module';
    const PLUGIN = 'plugin';

    private static $paths = [
        self::MODULE => [],
        self::PLUGIN => [],
    ];

    public static function register($type, $bundleName, $path)
    {
        self::$paths[$type][$bundleName] = str_replace('\\', '/', $path);
    }

    public static function getPaths($type)
    {
        return self::$paths[$type];
    }
}
