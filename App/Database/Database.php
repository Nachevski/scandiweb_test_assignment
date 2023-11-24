<?php

namespace App\Database;


use App\Database\Config\DatabaseConnection;
use App\Database\Queries\ProductQueries;
use PDO;


class Database extends DatabaseConnection implements ProductQueries
{
    public static function getProducts()
    {
        $conn = self::connect();
        $query = "SELECT * FROM products";
        $statement = $conn->prepare($query);
        $statement->execute();
        $data = $statement->fetchAll(PDO::FETCH_ASSOC);
        self::terminateConnection();
        return $data;
    }

    public static function deleteProducts(array $products)
    {
        $conn = self::connect();
        foreach ($products as $id) {
            $query = "DELETE FROM products WHERE id = '$id'";
            $statement = $conn->prepare($query);
            $statement->execute();
        }
        self::terminateConnection();
    }

    public static function isUnique($column, $value)
    {
        $conn = self::connect();
        $query = "SELECT * FROM products WHERE $column='$value';";
        $statement = $conn->prepare($query);
        $statement->execute();
        $product = $statement->fetch(PDO::FETCH_ASSOC);
        if (!empty($product)) {
            return false;
        }
        self::terminateConnection();
        return true;
    }
}



