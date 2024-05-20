<?php

namespace Obelaw\Framework\Base;

use Exception;
use Illuminate\Support\ServiceProvider;

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
        throw new Exception('You can\'t use `loadRoutesFrom` with Obelaw', 1000);
    }
}
