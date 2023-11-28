<?php

namespace App\Database\Queries;

interface ProductQueries
{
    public function getProducts();

    public function deleteProducts(array $products);

    public function isUnique($column, $value);
    
}