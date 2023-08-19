<?php

namespace Obelaw\Framework;

class Obelaw
{
    public static function routes($prefix = null)
    {
        require __DIR__ . '/../routes/web.php';
    }
}
