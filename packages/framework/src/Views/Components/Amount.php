<?php

namespace Obelaw\Framework\Views\Components;

use Illuminate\View\Component;

class Amount extends Component
{
    public $color = null;

    public function __construct(public $value, public $setColor = null)
    {
        $this->value = number_format($value, 2);

        if ($value != 0)
            $this->color = ($value > 0) ? 'green' : 'red';

        if ($setColor) {
            $this->color = $setColor;
        }
    }

    /**
     * Get the view / contents that represents the component.
     */
    public function render()
    {
        return <<<'BLADE'
            <span style="font-family: monospace;" class="text-{{ $color ?? 'orange' }}">{{ $value }} EGP</span>
        BLADE;
    }
}
