<?php

use Obelaw\Permissions\Models\Rule;
use Obelaw\UI\Schema\Form\Fields;
use Obelaw\UI\Schema\Form\FieldType;

return new class
{
    public function form(Fields $form)
    {
        $form->addField(FieldType::SELECT, [
            'label' => 'Rule',
            'model' => 'rule_id',
            'options' => [
                'model' => Rule::class,
                'row' => [
                    'label' => 'name',
                    'value' => 'id',
                ]
            ],
            'rules' => 'required',
            'order' => 10,
        ]);

        $form->addField(FieldType::TEXT, [
            'label' => 'name',
            'model' => 'name',
            'rules' => 'required',
            'placeholder' => 'IPhone x6',
            'order' => 20,
        ]);

        $form->addField(FieldType::TEXT, [
            'label' => 'Email',
            'model' => 'email',
            'rules' => 'required|email',
            'placeholder' => 'IPhone x6',
            'order' => 30,
        ]);

        $form->addField(FieldType::TEXT, [
            'label' => 'Password',
            'model' => 'password',
            'rules' => 'nullable',
            'placeholder' => 'IPhone x6',
            'order' => 40,
        ]);

        $form->addField(FieldType::SELECT, [
            'label' => 'Status',
            'model' => 'status',
            'options' => [
                [
                    'label' => 'Active',
                    'value' => 'active',
                ],
                [
                    'label' => 'Inactive',
                    'value' => 'inactive',
                ]
            ],
            'rules' => 'required',
            'order' => 50,
        ]);
    }
};
