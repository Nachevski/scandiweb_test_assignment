<?php
require_once('../../autoload.php');
header("Content-type: application/json");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type");

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST)) {
    $formInputs = $_POST;
    $className = 'App\\Products\\' . $formInputs['productType'];
    if (class_exists($className)) {
        $newProduct = new $className;
        $newProduct->setSKU($formInputs['sku']);
        $newProduct->setName($formInputs['name']);
        $newProduct->setPrice($formInputs['price']);
        $newProduct->setType($formInputs['productType']);
        $newProduct->setProductDescription($formInputs);
        $newProduct->saveToDB();
    } else {
        $_SESSION['ErrorException'] = 'Something goes wrong! Please try again';
    }
    header('LOCATION: /');

}