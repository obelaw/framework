<?php

namespace Obelaw\Framework\Modules;

use Illuminate\Support\Facades\Cache;
use Obelaw\Framework\Form\Fields;

class FormsManagement
{
    public static function mergeForms($modules)
    {
        $outForms = [];

        foreach ($modules as $id => $data) {
            $_form = [];

            if (is_dir($data['root'] . '/forms')) {
                foreach (glob($data['root'] . '/forms/*.php') as $filename) {
                    $formClass = include($filename);
                    $_form[$id . '_' . basename($filename, '.php')] = (new $formClass)->form(new Fields);
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
