<?php

namespace Obelaw\Framework\Views\Builder;

use Illuminate\View\Component;
use Illuminate\View\View;
use Obelaw\Framework\Form\Fields;
use Obelaw\Framework\Registrar;

class FormBuilder extends Component
{
    public $method = 'POST';
    public $action = null;
    public $fields = [];

    /**
     * Create the component instance.
     *
     * @param  string  $type
     * @param  string  $message
     * @return void
     */
    public function __construct($id = null, $method = 'POST', $action = null)
    {
        $this->method = $method;
        $this->action = $action;

        $formClass = Registrar::getForms($id);
        $this->fields = (new $formClass)->form(new Fields);
    }

    /**
     * Get the view / contents that represents the component.
     */
    public function render(): View
    {
        return view('obelaw::builder.form');
    }
}
