<?php

namespace Obelaw\Framework\Base;

use Illuminate\Support\Str;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Obelaw\Framework\Facades\Bundles;
use Obelaw\Framework\Views\Layout\DashboardLayout;

abstract class FromBase extends Component
{
    use LivewireAlert;

    public $models = null;

    protected $pretitle = 'Pre Title';
    protected $title = 'Title';

    private $fields = [];

    public function boot()
    {
        $this->fields = Bundles::getForms($this->formId);
        $this->subfotms = Bundles::getSubForms($this->formId);

        $models = [];

        foreach ($this->fields as $field) {
            $models[$field['model']] = $field['value'] ?? null;
        }

        $this->models = $models;
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
            $data['models.'.$field['model']] = $field['rules'];
        }

        return $data;
    }

    public function render()
    {
        return view('obelaw::builder.build.form', [
            'pretitle' => $this->preTitle(),
            'title' => $this->title(),
        ])->layout(DashboardLayout::class);
    }

    public function submit()
    {
        $validateData = $this->validate();

        $this->doSubmit($validateData);
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
