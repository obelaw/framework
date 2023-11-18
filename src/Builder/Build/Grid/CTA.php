<?php

namespace Obelaw\Framework\Builder\Build\Grid;

class CTA
{
    public $calls = [];

    public function setCall($label, $route)
    {
        $this->calls = array_merge($this->calls, [$label => $route]);

        return $this;
    }

    public function getCalls()
    {
        return $this->calls;
    }

    public static function call(
        string $route,
        string $type = 'route',
        string $color = 'primary',
        string $permission = null,
    ) {
        return [
            'type' => $type,
            'color' => $color,
            'route' => $route,
            'permission' => $permission,
        ];
    }
}
