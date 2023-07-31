<?php

namespace Obelaw\Framework\Views\Components;

use Illuminate\View\Component;

class Amount extends Component
{
    public function __construct(public $value)
    {
        $this->value = number_format($value, 2);
    }

    /**
     * Get the view / contents that represents the component.
     */
    public function render()
    {
        return <<<'BLADE'
            {{ $value }} EGP
        BLADE;
    }
}
