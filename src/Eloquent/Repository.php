<?php

namespace Obelaw\Framework\Eloquent;

use Illuminate\Database\Eloquent\Model;

abstract class Repository
{
    /**      
     * @var Model      
     */
    protected $model;

    /**      
     * BaseRepository constructor.      
     *      
     * @param Model $model      
     */
    public function __construct(Model $model)
    {
        $this->model = $model;
    }
}
