<?php

namespace Obelaw\Framework\Contracts\Builder\Grid;

use Illuminate\Database\Eloquent\Builder;

interface WhereBuilder
{
    public function where(Builder $query);
}
