<?php

namespace App;

use Medoo\Medoo;

class Db extends Medoo{
    protected static $db;

    /**
     * Connect to a database
     *
     * @param array $config
     * @return void
     */
    public static function connect (array $config = []) : void{
        static::$db = new Medoo($config);
    }

    /**
     * Create a new record
     *
     * @param string $table
     * @param array $data
     * @return bool
     */
    public static function create (string $table, array $data = []) : bool{
        static::$db->insert($table, $data);
        
        return static::lastInsertedId() > 0;
    }


    /**
     * Find a record with a given id
     *
     * @param string $table
     * @param int $id
     * @return array|null
     */
    public static function find (string $table, int $id) : ?array{
        return static::$db->get($table, '*', [
            'id' => $id
        ]);
    }

    /**
     * Check if a given record exists in the table
     *
     * @param string $table
     * @param array $where
     * @return bool
     */
    public static function exists (string $table, array $where = []) : bool{
        return static::$db->has($table, $where);
    }

    /**
     * Fetch all rows matching the where clause
     *
     * @param string $table
     * @param array $where
     * @param array $columns
     * @return array|null
     */
    public static function where (string $table, array $where = [], array $columns = []) : ?array{
        $columns = !empty($columns) ?: '*';

        return static::$db->select($table, $columns, $where);
    }

    /**
     * Get last executed query
     *
     * @return string
     */
    public static function getLastQuery () : string{
        return static::$db->last();
    }

    /**
     * Get last inserted id
     *
     * @return int
     */
    public static function lastInsertedId () : int{
        return static::$db->id();
    }
}