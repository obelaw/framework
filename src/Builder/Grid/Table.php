<?php

namespace Obelaw\Framework\Builder\Grid;

class Table
{
    public $labels = [];
    public $dataKeys = [];
    public $bottoms = null;
    public $setCTAs = null;
    public $model = null;
    public $links = null;

    public function __construct($model)
    {
        $this->model = $model;
    }

    public function addColumn($label, $dataKey)
    {
        array_push($this->labels, $label);
        array_push($this->dataKeys, $dataKey);

        return $this;
    }

    public function getLabels()
    {
        return $this->labels;
    }

    public function getDataKeys()
    {
        return $this->dataKeys;
    }

    public function setBottoms($bottoms)
    {
        $this->bottoms = $bottoms;
    }

    public function setCTAs($calls)
    {
        $this->setCTAs = $calls;
    }

    public function getLinks()
    {
        return $this->links;
    }

    public function getRows()
    {
        $model = (new $this->model)->paginate(25);

        $this->links = $model->links();

        return $model->map(function ($column) {
            $rows = [];

            $rows['primary'] = $column->id;

            foreach ($this->getDataKeys() as $key) {
                $rows['columns'][] = $column->{$key};
            }

            $rows['calls'] = $this->setCTAs;
            return $rows;
        });
    }
}
