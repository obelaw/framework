<?php

declare(strict_types=1);

use Obelaw\Facades\Bundles;

/**
 * Call artisan command and return code.
 *
 * @return PendingCommand|int
 */
if (!function_exists('hasModule')) {
    function hasModule($id)
    {
        return Bundles::hasModule($id);
    }
}
