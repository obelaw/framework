<?php

namespace Obelaw\UI\Renderer;

use Obelaw\UI\Renderer\FormRender;
use Obelaw\UI\Utils\Actions\Exceptions\AlertErrorException;
use Obelaw\UI\Utils\Actions\Exceptions\AlertWarningException;

abstract class FormActionRender extends FormRender
{
    protected $actionClass = null;

    public function submit()
    {
        $inputs = $this->getInputs();

        $action = new $this->actionClass;

        try {
            // Check has properties to set to action.
            if (method_exists($this, 'properties'))
                $action->setProperties($this->properties());

            call_user_func_array([$action, 'handle'], [$inputs]);
            $this->pushAlert('success', $action->getSuccessMessage());
        } catch (AlertWarningException $e) {
            $this->pushAlert('warning', $e->getMessage());
        } catch (AlertErrorException $e) {
            $this->pushAlert('error', $e->getMessage());
        }
    }
}
