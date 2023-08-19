<?php

namespace Obelaw\Framework\Pipeline\Bundles\Compiling;

use Illuminate\Support\Facades\Cache;
use Obelaw\Framework\Builder\Form\Fields;

class FormsCompile
{
    public $count = 0;

    public function __construct(
        protected $cachePrefix = null,
        protected $actives = null
    ) {
    }

    public function mergeForms($paths)
    {
        $outForms = [];

        foreach ($paths as $id => $path) {
            $_form = [];

            //
            if (is_array($this->actives) && !in_array($id, $this->actives)) {
                continue;
            }

            if (is_dir($path . DIRECTORY_SEPARATOR . 'etc/forms')) {

                foreach (glob($path . DIRECTORY_SEPARATOR . 'etc/forms' . DIRECTORY_SEPARATOR . '*.php') as $filename) {
                    $formClass = include($filename);

                    $fields = new Fields;

                    (new $formClass)->form($fields);

                    $formId = $id . '_' . basename($filename, '.php');

                    if (isset($this->appendFields($paths)[$formId])) {
                        $fields->mergeFields($this->appendFields($paths)[$formId]);
                    }

                    $_form[$id . '_' . basename($filename, '.php')] = $fields->getFields();
                }

                $outForms = array_merge($outForms, $_form);
            }
        }

        return $outForms;
    }

    public function cacheForms($forms)
    {
        Cache::forever($this->cachePrefix . 'obelawForms', $forms);
    }

    public function manage($paths)
    {
        $forms = $this->mergeForms($paths);
        $this->cacheForms($forms);
        $this->count = count($forms);
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
    public function appendFields($paths)
    {
        $outfields = [];

        foreach ($paths as $id => $path) {
            //
            if (is_array($this->actives) && !in_array($id, $this->actives)) {
                continue;
            }

            if (is_dir($path . DIRECTORY_SEPARATOR . 'etc/forms' . DIRECTORY_SEPARATOR . 'appends')) {
                foreach (glob($path . DIRECTORY_SEPARATOR . 'etc/forms' . DIRECTORY_SEPARATOR . 'appends' . DIRECTORY_SEPARATOR . '*.php') as $filename) {
                    $formClass = include($filename);

                    $fields = new Fields;

                    $formClass = new $formClass;

                    $formClass->form($fields);

                    $outfields[$formClass->appendTo] = array_merge($outfields[$formClass->appendTo] ?? [], $fields->getFields());
                }
            }
        }

        return $outfields;
    }
}
