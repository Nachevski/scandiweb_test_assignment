<?php

namespace App\Products;

use App\Database\DatabaseConnection;
use App\Database\Queries\ProductQueries;
use PDO;

class ProductFactory extends DatabaseConnection implements ProductQueries
{
    private $conn = null;

    public function __construct()
    {
        $this->conn = $this->DBconnect();
    }

    public function getProducts()
    {
        $query = "SELECT * FROM products";
        $statement = $this->conn->prepare($query);
        $statement->execute();
        $data = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }

    public function deleteProducts(array $products)
    {
        foreach ($products as $id) {
            $query = "DELETE FROM products WHERE id = '$id'";
            $statement = $this->conn->prepare($query);
            $statement->execute();
        }
    }

    public function isUnique($column, $value)
    {
        $query = "SELECT * FROM products WHERE $column='$value';";
        $statement = $this->conn->prepare($query);
        $statement->execute();
        $product = $statement->fetch(PDO::FETCH_ASSOC);
        if (!empty($product)) {
            return false;
        }
        return true;
    }


}