<?php

namespace Obelaw\Framework\Base;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;
use Obelaw\Framework\Pipeline\Locale\Http\Middleware\LocaleMiddleware;

abstract class ServiceProviderBase extends ServiceProvider
{
    /**
     * Load the given routes file if routes are not already cached.
     *
     * @param  string  $path
     * @return void
     */
    protected function loadRoutesFrom($path)
    {
        Route::middleware(['web', 'obelawPermission', LocaleMiddleware::class])
            ->prefix('obelaw')
            ->group(function () use ($path) {
                parent::loadRoutesFrom($path);
            });
    }
}
