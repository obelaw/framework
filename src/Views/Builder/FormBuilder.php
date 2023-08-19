<?php

namespace Obelaw\Framework\Views\Builder;

use Illuminate\View\Component;
use Illuminate\View\View;
use Obelaw\Framework\Facades\Bundles;

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

        $this->fields = Bundles::getForms($id);
    }

    /**
     * Get the view / contents that represents the component.
     */
    public function render(): View
    {
        return view('obelaw::builder.form');
    }
}
