<?php

namespace App\Products;

abstract class Product
{
    protected $id;
    protected $sku;
    protected $name;
    protected $price;
    protected $type;

    abstract function getProductDescription();

    abstract function setProductDescription(array|string $data);

    abstract function saveToDb();
    
}