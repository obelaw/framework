<?php

namespace Obelaw\Framework\ACL\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Obelaw\Framework\ACL\Traits\HasACL;
use Obelaw\Framework\Base\ModelConnection;

class Admin extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'rule_id',
        'name',
        'email',
        'password',
        'status',
    ];

    /**
     * Create a new instance of the Model.
     *
     * @param array $attributes
     */
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);

        if ($connection = ModelConnection::getConnection()) {
            $this->setConnection($connection);
        }

        $this->setTable(config('obelaw.database.table_prefix', 'obelaw_') . $this->getTable());
    }

    public function rule()
    {
        return $this->hasOne(Rule::class, 'id', 'rule_id');
    }
}
