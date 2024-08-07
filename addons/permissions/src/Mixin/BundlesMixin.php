<?php

namespace Obelaw\Permissions\Mixin;

class BundlesMixin
{
    public function getACls()
    {
        return function () {
            $ACLs = $this->getDriver()->get('obelawACLs');

            return $this->BundlesDisable($ACLs);
        };
    }
}
