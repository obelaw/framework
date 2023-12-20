<?php

namespace Obelaw\Framework;

class Obelaw
{
    public static function webRoutes($prefix = null)
    {
        require __DIR__ . '/../routes/web.php';
    }

    public static function apiRoutes($prefix = null)
    {
        require __DIR__ . '/../routes/api.php';
    }
}
