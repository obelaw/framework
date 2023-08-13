<?php

namespace Obelaw\Framework\Base;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Str;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

abstract class FromBase extends Component
{
    use LivewireAlert;

    protected $pretitle = 'Pre Title';
    protected $title = 'Title';

    private $fields = [];

    public function boot()
    {
        $this->fields = Cache::get('obelawForms')[$this->formId];

        foreach ($this->fields as $field) {
            $this->{$field['model']} = $field['value'] ?? null;
        }
    }

    public function preTitle()
    {
        return Str::contains($this->pretitle, '::forms') ? __($this->pretitle) : $this->pretitle;
    }

    public function title()
    {
        return Str::contains($this->title, '::forms') ? __($this->title) : $this->title;
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
        return view('obelaw::builder.build.form', [
            'pretitle' => $this->preTitle(),
            'title' => $this->title(),
        ])->layout($this->layout());
    }

    protected function layout()
    {
        //
    }

    protected function pushAlert($type = 'success', $massage)
    {
        $this->alert($type, $massage, [
            'position' => 'top-end',
            'timer' => 5000,
            'toast' => true,
            'timerProgressBar' => true,
        ]);
    }
}
