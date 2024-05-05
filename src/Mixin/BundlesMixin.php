<?php

namespace Obelaw\Framework\Mixin;

class BundlesMixin
{
    public function getAtInstalls()
    {
        return function () {
            return $this->driver
                ->setPrefix($this->getCachePrefix())
                ->get('obelawInstall');
        };
    }
}
