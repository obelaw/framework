<?php

declare(strict_types=1);

if (!function_exists('amount')) {
    function amount(float $value)
    {
        return number_format($value, 2);
    }
}
