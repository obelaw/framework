<?php

namespace Obelaw\Permissions\Mixin;

class BundlesMixin
{
    public function getACls()
    {
        return function () {
            $ACLs = $this->driver
                ->setPrefix($this->getCachePrefix())
                ->get('obelawACLs');

            return $this->BundlesDisable($ACLs);
        };
    }
}
