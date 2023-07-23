<?php

namespace Obelaw\Framework\Builder\Build\Grid;

class Table
{
    public $columns = [];

    public function setColumn($label, $dataKey)
    {
        $this->columns = array_merge($this->columns, [$label => $dataKey]);

        return $this;
    }

    public function getColumns()
    {
        return $this->columns;
    }
}
