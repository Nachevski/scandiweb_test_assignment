<?php

namespace App\Products;

use App\Database\DatabaseConnection;

class Book extends Product
{
    private $weight;

    public function setId($id): void
    {
        $this->id = $id;
    }

    public function setSKU($SKU)
    {
        $this->sku = $SKU;
    }


    public function setName($name)
    {
        $this->name = $name;
    }

    public function setPrice($price)
    {
        $this->price = $price;
    }

    public function setProductDescription(array|string $data)
    {
        (isset($data['weight'])) ? $this->weight = $data['weight'] : $this->weight = $data;
    }

    public function setType($type): void
    {
        $this->type = $type;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getSKU()
    {
        return $this->sku;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getPrice()
    {
        return number_format((float)$this->price, 2, '.', ',');
    }

    public function getType()
    {
        return $this->type;
    }

    public function getProductDescription()
    {
        return "Weight: $this->weight Kg";
    }

    public function saveToDB()
    {
        $db = new DatabaseConnection();
        $conn = $db->DBconnect();
        $query = "INSERT INTO products (sku, name, price, product_description, product_type)
         values('$this->sku',
             '$this->name',
             '$this->price',
             '$this->weight',
             '$this->type');";
        $statement = $conn->prepare($query);
        $statement->execute();
    }
}