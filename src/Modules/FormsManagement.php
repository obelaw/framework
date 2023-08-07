<?php

namespace Obelaw\Framework\Modules;

use Illuminate\Support\Facades\Cache;
use Obelaw\Framework\Builder\Form\Fields;

class FormsManagement
{
    public static function mergeForms($modules)
    {
        $outForms = [];

        foreach ($modules as $id => $data) {
            $_form = [];

            if (is_dir($data['root'] . DIRECTORY_SEPARATOR . 'forms')) {
                foreach (glob($data['root'] . DIRECTORY_SEPARATOR . 'forms' . DIRECTORY_SEPARATOR . '*.php') as $filename) {
                    $formClass = include($filename);

                    $fields = new Fields;

                    (new $formClass)->form($fields);

                    $formId = $id . '_' . basename($filename, '.php');

                    if (isset(static::appendFields($modules)[$formId])) {
                        $fields->mergeFields(static::appendFields($modules)[$formId]);
                    }

                    $_form[$id . '_' . basename($filename, '.php')] = $fields->getFields();
                }

                $outForms = array_merge($outForms, $_form);
            }
        }

        return $outForms;
    }

    public static function cacheForms($forms)
    {
        Cache::forever('obelawForms', $forms);
    }

    public static function manage($modules)
    {
        static::cacheForms(static::mergeForms($modules));
    }

    /**
     * Append external fields
     * 
     * Example:-
        use Obelaw\Framework\Builder\Form\Fields;

        return new class
        {
            public $appendTo = '<form_id>';

            public function form(Fields $form)
            {
                ...
            }
        };
     */
    public static function appendFields($modules)
    {
        $outfields = [];

        foreach ($modules as $module) {
            if (is_dir($module['root'] . DIRECTORY_SEPARATOR . 'forms' . DIRECTORY_SEPARATOR . 'appends')) {
                foreach (glob($module['root'] . DIRECTORY_SEPARATOR . 'forms' . DIRECTORY_SEPARATOR . 'appends' . DIRECTORY_SEPARATOR . '*.php') as $filename) {
                    $formClass = include($filename);

                    $fields = new Fields;

                    $formClass = new $formClass;

                    $formClass->form($fields);

                    $outfields[$formClass->appendTo] = $fields->getFields();
                }
            }
        }

        return $outfields;
    }
}
