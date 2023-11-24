<?php
require_once('../../autoload.php');

use App\Database\Database;

header("Content-type: application/json");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type");

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST)) {
    Database::deleteProducts(json_decode($_POST['data']));
    echo json_encode(['status' => 'success']);
    die();
}
header('LOCATION: /');