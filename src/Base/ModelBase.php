<?php

namespace Obelaw\Framework\Base;

use Illuminate\Database\Eloquent\Model;

abstract class ModelBase extends Model
{
    /**
     * Create a new instance of the Model.
     *
     * @param array $attributes
     */
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);

        $this->setTable(config('obelaw.database.table_prefix', 'obelaw_') . $this->getTable());
    }
}
