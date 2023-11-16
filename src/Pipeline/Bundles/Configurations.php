<?php

namespace Obelaw\Framework\Pipeline\Bundles;

class Configurations
{
    public $providers = [];

    public function setProvider($providerClass)
    {
        array_push($this->providers, $providerClass);
    }

    public function getProviders()
    {
        return $this->providers;
    }
}
