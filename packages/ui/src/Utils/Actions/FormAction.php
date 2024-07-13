<?php

namespace Obelaw\UI\Utils\Actions;

abstract class FormAction
{
    protected $successMessage = null;
    protected $properties = null;

    abstract public function handle($inputs);

    public function getSuccessMessage()
    {
        return $this->successMessage ?? 'Saved';
    }

    /**
     * Get the value of properties
     */
    public function getProperties($property = null)
    {
        if ($property)
            return $this->properties[$property];

        return (object)$this->properties;
    }

    /**
     * Set the value of properties
     */
    public function setProperties($properties)
    {
        $this->properties = $properties;
    }
}
