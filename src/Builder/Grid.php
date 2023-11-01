<?php

namespace Obelaw\Framework\Builder;

use Obelaw\Framework\Builder\Grid\Table;

class Grid
{
    public static function model($model = null, $where = null)
    {
        return new Table($model, $where);
    }
}
