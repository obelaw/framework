<?php

namespace Obelaw\Framework\Base;

use Illuminate\Support\Facades\Cache;
use Livewire\Component;

abstract class FromBase extends Component
{
    private $fields = [];

    public function boot()
    {
        $this->fields = Cache::get('obelawForms')[$this->formId];

        foreach ($this->fields as $field) {
            $this->{$field['model']} = $field['value'] ?? null;
        }
    }

    protected function rules()
    {
        $data = [];

        foreach ($this->fields as $field) {
            $data[$field['model']] = $field['rules'];
        }

        return $data;
    }

    public function render()
    {
        return view('obelaw::layouts.form')->layout($this->layout());
    }

    protected function layout()
    {
        //
    }
}
