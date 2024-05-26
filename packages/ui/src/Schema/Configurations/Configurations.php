<?php

namespace Obelaw\UI\Schema\Configurations;

class Configurations
{
    private $configurations = [];

    public function setConfig($label, $formId)
    {
        array_push($this->configurations, [
            'label' => $label,
            'formId' => $formId,
        ]);

        return $this;
    }

    public function getConfigs()
    {
        return $this->configurations;
    }
}
