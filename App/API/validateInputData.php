<?php
require_once('../../autoload.php');
header("Content-type: application/json");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type");

use App\Validation\Validator;

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST)) {
    echo json_encode(Validator::validate($_POST));
    die();
}
header('LOCATION: /');