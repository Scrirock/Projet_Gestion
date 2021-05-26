<?php

use Controller\HistoryManager;
use Model\Entity\History;

require $_SERVER['DOCUMENT_ROOT'] . "/Model/DB.php";
require $_SERVER['DOCUMENT_ROOT'] . "/Model/Entity/History.php";
require $_SERVER['DOCUMENT_ROOT'] . "/Model/Manager/Traits/ManagerTrait.php";
require $_SERVER['DOCUMENT_ROOT'] . "/Model/Manager/HistoryManager.php";

header('Content-Type: application/json');

date_default_timezone_set('Europe/Paris');
setlocale(LC_TIME, 'fr_FR.utf8','fra');
$manager = new HistoryManager();
if ($_SERVER['REQUEST_METHOD'] === "GET"){
    try {
        echo getHistory($manager);
    }
    catch (Exception $e) {
    }
}

/**
 * @param HistoryManager $manager
 * @return string
 * @throws Exception
 */
function getHistory(HistoryManager $manager): string {
    $response = [];

    $data = $manager->getHistory();
    foreach($data as $history) {
        /* @var History $history */
        $response[] = [
            'date' => strftime("%A %e %B %Y", strtotime($history->getDate()) ),
            'stock' => $history->getDifference(),
            'name' => $history->getHistoryProductName()
        ];
    }

    return json_encode($response);
}

exit;