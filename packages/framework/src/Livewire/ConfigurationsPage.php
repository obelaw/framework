<?php

namespace Obelaw\Framework\Livewire;

use Livewire\Component;
use Obelaw\Facades\Bundles;
use Obelaw\UI\Views\Layout\DashboardLayout;

class ConfigurationsPage extends Component
{
    public $inputs = [];
    public $configurations = [];

    private $fields = [];

    public function booted()
    {
        foreach (Bundles::getConfigurations() as $configuration) {
            foreach ($configuration['configs'] as $config) {
                $this->fields = array_merge($this->fields, Bundles::getFormFields($config['formId']));
            }

            foreach (Bundles::getFormTabs($config['formId']) as $tab) {
                $this->fields = array_merge($this->fields, $tab['fields']);
            }
        }


        // dd($this->fields);

        // $this->fields = Bundles::getFormFields('obelaw_helper_permissions_rule_configs');

        foreach ($this->fields as $field) {
            $this->{'inputs.' . $field['model']} = $field['value'] ?? null;
        }

        // o_config()->get(str_replace('_', '.', $field['model']), null)

        $iinputs = [];

        foreach ($this->fields as $field) {
            $iinputs[$field['model']] = o_config()->get(str_replace('_', '.', $field['model']), null);
        }

        $this->setInputs($iinputs);
    }

    public function mount()
    {
        $this->configurations = Bundles::getConfigurations();
        // dd(Bundles::getConfigurations());
    }

    protected function rules()
    {
        $data = [];

        foreach ($this->fields as $field) {
            $data['inputs.' . $field['model']] = $field['rules'];
        }

        return $data;
    }

    public function render()
    {
        return view('obelaw::configurations', [
            'configurations' => $this->configurations,
        ])->layout(DashboardLayout::class);
    }

    public function submit()
    {
        foreach ($this->getInputs() as $path => $value) {
            $path = str_replace('_', '.', $path);

            // dd($path);

            if (!is_null($value)) {
                o_config()->set($path, $value);
            }
        }
    }

    private function getInputs(string $key = null)
    {
        $inputs = $this->validate()['inputs'] ?? [];

        if ($key) {
            return $inputs[$key] ?? null;
        }

        return $inputs;
    }

    public function setInputs(array $inputs = [])
    {
        return $this->inputs = $inputs ?? [];
    }
}
