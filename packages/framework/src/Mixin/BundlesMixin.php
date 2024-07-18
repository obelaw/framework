<?php

namespace Obelaw\Framework\Mixin;

class BundlesMixin
{
    public function getAtInstalls()
    {
        return function () {
            return $this->getDriver()->get('obelawInstall');
        };
    }
}
