<?php

namespace Obelaw\Framework\Managers;

use Obelaw\Framework\Pipeline\Locale\Http\Middleware\LocaleMiddleware;

class Middlewares
{
    private $middlewares = [
        [
            'sort' => 1,
            'middleware' => 'web',
        ],
        [
            'sort' => 999,
            'middleware' => LocaleMiddleware::class,
        ],
    ];

    public function addMiddleware($middleware, int $sort = 999): void
    {
        $middleware = [
            [
                'sort' => $sort,
                'middleware' => $middleware,
            ]
        ];

        $collection = collect($this->middlewares);
        $collection = $collection->merge($middleware);

        $this->middlewares = $collection->all();
    }

    public function getMiddlewares(): array
    {
        $collection = collect($this->middlewares);
        $collection = $collection->sortBy('sort');
        $collection = $collection->map(function (array $item, int $key) {
            return $item['middleware'];
        });

        return $collection->all();
    }
}
