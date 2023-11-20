<?php

namespace Obelaw\Framework\Builder\Build\Grid;

use Obelaw\Framework\Builder\Build\Common\ActionButton;

class CTA
{
    public $calls = [];

    public function setCall($label, ActionButton $actionButton)
    {
        $this->calls = array_merge($this->calls, [$label => $actionButton->getButton()]);
        return $this;
    }

    public function getCalls()
    {
        return $this->calls;
    }
}
