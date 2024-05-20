<?php

namespace Obelaw\Permissions\Livewire\Rules;

use Obelaw\Permissions\Attributes\Access;
use Obelaw\Permissions\Models\Rule;
use Obelaw\UI\Renderer\FormRender;

#[Access('permissions_rule_update')]
class UpdateRuleComponent extends FormRender
{
    public $formId = 'obelaw_helper_permissions_rule_form';

    public $rule = null;

    protected $pretitle = 'Permissions';
    protected $title = 'Update This Rule';

    public function mount(Rule $rule)
    {
        $this->rule = $rule;

        $this->setInputs([
            'name' => $rule->name,
        ]);
    }

    public function submit()
    {
        $validateData = $this->getInputs();

        $this->rule->update($validateData);

        $this->pushAlert('success', 'The rule has been update');

        return redirect()->route('obelaw.permissions.rules.index');
    }
}
