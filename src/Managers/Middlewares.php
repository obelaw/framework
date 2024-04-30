<?php

namespace Obelaw\Framework\Managers;

use Obelaw\Framework\Pipeline\Locale\Http\Middleware\LocaleMiddleware;

class Middlewares
{
    private $middlewares = [
        'web',
        LocaleMiddleware::class
    ];

    public function addMiddleware($middleware): void
    {
        array_push($this->middlewares, $middleware);
    }

    public function getMiddlewares(): array
    {
        return $this->middlewares;
    }
}
