<?php

namespace Obelaw\Permissions\Livewire\Rules;

use Obelaw\Permissions\Attributes\Access;
use Obelaw\Permissions\Models\Rule;
use Obelaw\UI\Renderer\FormRender;

#[Access('permissions_rule_create')]
class CreateRuleComponent extends FormRender
{
    public $formId = 'obelaw_helper_permissions_rule_form';

    protected $pretitle = 'Permissions';
    protected $title = 'Create New Rule';

    public function submit()
    {
        $validateData = $this->getInputs();

        $validateData['permissions'] = [];

        $rule = Rule::create($validateData);

        $this->pushAlert('success', 'The rule has been created');

        return redirect()->route('obelaw.permissions.rules.permissions', [$rule]);
    }
}
