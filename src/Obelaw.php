<?php

namespace Obelaw\Framework;

class Obelaw
{
    public static function webRoutes()
    {
        require self::webPathRoutes();
    }

    public static function apiRoutes()
    {
        require self::apiPathRoutes();
    }

    public static function webPathRoutes()
    {
        return __DIR__ . '/../routes/web.php';
    }

    public static function apiPathRoutes()
    {
        return __DIR__ . '/../routes/api.php';
    }
}
