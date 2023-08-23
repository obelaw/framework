<?php

namespace Obelaw\Framework\Views\Components;

use Illuminate\View\Component;

class Amount extends Component
{
    public $thanZero = null;

    public function __construct(public $value)
    {
        $this->value = number_format($value, 2);

        if ($value != 0)
            $this->thanZero = ($value > 0) ? 'green' : 'red';
    }

    /**
     * Get the view / contents that represents the component.
     */
    public function render()
    {
        return <<<'BLADE'
            <span style="font-family: monospace;" class="text-{{ $thanZero ?? 'orange' }}">{{ $value }} EGP</span>
        BLADE;
    }
}
