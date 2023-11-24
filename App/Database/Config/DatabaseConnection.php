<?php

namespace App\Database\Config;

use PDO;

class DatabaseConnection
{
    private static $instance = null;

    public static function connect()
    {
        self::$instance = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USERNAME, DB_PASSWORD);
        return self::$instance;
    }

    protected static function terminateConnection()
    {
        self::$instance = null;
    }
}