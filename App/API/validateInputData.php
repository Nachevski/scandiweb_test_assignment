<?php
require_once('../../autoload.php');
header("Content-type: application/json");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type");

use App\Validation\Validator;

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST)) {
    $validator = new Validator();
    echo json_encode($validator->validate($_POST));
    die();
}
header('LOCATION: /');