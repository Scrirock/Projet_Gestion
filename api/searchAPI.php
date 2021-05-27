<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

use Controller\StockController;

require $_SERVER['DOCUMENT_ROOT'] . "/Model/DB.php";
require $_SERVER['DOCUMENT_ROOT'] . "/Model/Entity/Stock.php";
require $_SERVER['DOCUMENT_ROOT'] . "/Model/Manager/Traits/ManagerTrait.php";
require $_SERVER['DOCUMENT_ROOT'] . "/Model/Manager/StockManager.php";
require $_SERVER['DOCUMENT_ROOT'] . "/Controller/Traits/RenderViewTrait.php";
require $_SERVER['DOCUMENT_ROOT'] . "/Controller/StockController.php";
header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === "POST"){
    $data = json_decode(file_get_contents('php://input'));
    (new StockController())->getBySearch($data->request);
}

exit;