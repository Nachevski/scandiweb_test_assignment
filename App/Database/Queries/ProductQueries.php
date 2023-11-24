<?php

namespace App\Database\Queries;

interface ProductQueries
{
    public static function getProducts();

    public static function deleteProducts(array $products);

    public static function isUnique($column, $value);
}