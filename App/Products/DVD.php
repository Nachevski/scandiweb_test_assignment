<?php

namespace App\Products;

use App\Database\DatabaseConnection;

class DVD extends Product
{
    private $size;

    public function setId($id)
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
        (isset($data['size'])) ? $this->size = $data['size'] : $this->size = $data;
    }

    public function setType($type)
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
        return "Size: $this->size MB";
    }

    public function saveToDB()
    {
        $db = new DatabaseConnection();
        $conn = $db->DBconnect();
        $query = "INSERT INTO products (sku, name, price, product_description, product_type)
         values('$this->sku',
             '$this->name',
             '$this->price',
             '$this->size',
             '$this->type');";
        $statement = $conn->prepare($query);
        $statement->execute();
    }
}