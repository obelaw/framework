<?php

namespace Obelaw\Framework\Pipeline\Identification;

class Identifier
{
    public static $module = null;

    public static function setModule(array $module)
    {
        static::$module = $module;
    }

    public static function getModule()
    {
        return static::$module;
    }
}
