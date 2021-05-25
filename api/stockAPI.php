<?php

use Model\Entity\Stock;
use Model\stock\StockManager;

require $_SERVER['DOCUMENT_ROOT'] . "/Model/DB.php";
require $_SERVER['DOCUMENT_ROOT'] . "/Model/Entity/Stock.php";
require $_SERVER['DOCUMENT_ROOT'] . "/Model/Manager/Traits/ManagerTrait.php";
require $_SERVER['DOCUMENT_ROOT'] . "/Model/Manager/StockManager.php";
header('Content-Type: application/json');

$manager = new StockManager();
if ($_SERVER['REQUEST_METHOD'] === "GET"){
    echo getStock($manager);
}

/**
 * @param StockManager $manager
 * @return string
 */
function getStock(StockManager $manager): string {
    $response = [];

    $data = $manager->getStock();
    foreach($data as $stock) {
        /* @var Stock $stock */
        $response[] = [
            'name' => $stock->getName(),
            'stock' => $stock->getStock(),
            'stockMin' => $stock->getStockMin()
        ];
    }

    return json_encode($response);
}

exit;