<?php

namespace Obelaw\Framework\Builder\Build\Grid;

class Bottom
{
    public $bottoms = [];

    public function setBottom($label, $route, $icon = 'plus', $permission = null)
    {
        $bottom = [
            'label' => $label,
            'route' => $route,
            'icon' => $icon,
            'permission' => $permission,
        ];

        array_push($this->bottoms, $bottom);

        return $this;
    }

    public function getBottoms()
    {
        return $this->bottoms;
    }
}
