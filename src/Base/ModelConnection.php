<?php

namespace Obelaw\Framework\Base;

class ModelConnection
{
    public static $connection = 'o_connection';
    public static $database = 'o_connection_database';

    public static function setConnection($connection)
    {
        session([static::$connection => $connection]);
    }

    public static function getConnection()
    {
        return session(static::$connection);
    }

    public static function setDatabase($database)
    {
        session([static::$database => $database]);
    }

    public static function getDatabase()
    {
        return session(static::$database);
    }
}
