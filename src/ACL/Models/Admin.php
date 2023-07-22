<?php

namespace Obelaw\Framework\ACL\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Obelaw\Framework\ACL\Traits\HasACL;

class Admin extends Authenticatable
{
    use HasACL;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

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
