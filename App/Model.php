<?php

namespace App;

use App\Db;

abstract class Model
{
    /**
     * Create a new item
     *
     * @param array $data
     * @return bool|null
     */
    public static function create (array $data = []) : ?bool{
        if(empty($data))
            return false;
        
        return Db::create(static::$table, $data);
    }

    /**
     * Find a record with a given id
     *
     * @param int $id
     * @return array|null
     */
    public static function find (int $id) : ?array{
        return Db::find(static::$table, $id) ?: null;
    }

    /**
     * Fetch all rows matching the where clause
     *
     * @param array $where
     * @param array $columns
     * @return array|null
     */
    public static function where (array $where = [], array $columns = []) : ?array{
        return Db::where(static::$table, $where,$columns);
    }

    /**
     * Fetch all rows from the table
     *
     * @return array|null
     */
    public static function all () : ?array{
        return Db::where(static::$table);
    }

    /**
     * Check if a given record exists in the table
     *
     * @param array $where
     * @return bool
     */
    public static function exists (array $where) : ?bool{
        return Db::exists(static::$table, $where) ?: null;
    }
}
