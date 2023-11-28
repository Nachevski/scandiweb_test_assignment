<?php

namespace App\Database;


use PDO;
use const App\Database\Config\DB_HOST;
use const App\Database\Config\DB_NAME;
use const App\Database\Config\DB_PASSWORD;
use const App\Database\Config\DB_USERNAME;


class DatabaseConnection
{
    private $instance = null;

    public function DBconnect()
    {
        if (!isset($this->instance)) {
            $this->instance = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USERNAME, DB_PASSWORD);
        }
        return $this->instance;
    }
}



