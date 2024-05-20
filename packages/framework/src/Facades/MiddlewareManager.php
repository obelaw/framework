<?php

namespace Obelaw\Framework\Facades;

use Illuminate\Support\Facades\Facade;

class MiddlewareManager extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'manager.middleware';
    }
}
