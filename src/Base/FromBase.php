<?php

namespace Obelaw\Framework\Base;

use Illuminate\Support\Facades\Cache;
use Livewire\Component;
use Jantinnerezo\LivewireAlert\LivewireAlert;

abstract class FromBase extends Component
{
    use LivewireAlert;

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

    protected function psuhAlert($type = 'success', $massage)
    {
        $this->alert($type, $massage, [
            'position' => 'top-end',
            'timer' => 5000,
            'toast' => true,
            'timerProgressBar' => true,
        ]);
    }
}
