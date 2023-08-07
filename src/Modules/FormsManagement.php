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
}
