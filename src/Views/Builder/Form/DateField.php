<?php

namespace Obelaw\Framework\Views\Builder\Form;

use Illuminate\View\Component;

class DateField extends Component
{
    public function __construct(
        public $label = 'set label',
        public $placeholder = '',
        public $model = 'set name',
        public $hint = null,
        public $required = false,
    ) {
    }

    public function render()
    {
        return view('obelaw::builder.form.date');
    }
}
