<?php

namespace App\Products;

use App\Database\DatabaseConnection;

class Furniture extends Product
{
    private $height;
    private $width;
    private $length;

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
        if (is_array($data)) {
            $this->height = $data['height'];
            $this->width = $data['width'];
            $this->length = $data['length'];
            return;
        }
        $dimensions = explode('x', $data);
        $this->height = $dimensions[0];
        $this->width = $dimensions[1];
        $this->length = $dimensions[2];
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
        return "Dimensions: " . $this->height . "x" . $this->width . "x" . $this->length;
    }

    public function saveToDB()
    {
        $db = new DatabaseConnection();
        $conn = $db->DBconnect();
        $dimensions = substr($this->getProductDescription(), 12);
        $query = "INSERT INTO products (sku, name, price, product_description, product_type)
         values('$this->sku',
             '$this->name',
             '$this->price',
             '$dimensions',
             '$this->type');";
        $statement = $conn->prepare($query);
        $statement->execute();
    }

}