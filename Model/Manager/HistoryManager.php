<?php

namespace Controller;

use Model\DB;
use Model\Entity\History;
use Model\Manager\Traits\ManagerTrait;

class HistoryManager{

    use ManagerTrait;

    public function getHistory(): array{
        $request = DB::getInstance()->prepare("SELECT * FROM history");
        if ($request->execute()){
            $historyData = $request->fetchAll();
            foreach ($historyData as $data){
                $totalHistory[] = new History($data['date'], $data['difference'], $data['history_product_name']);
            }

            return $totalHistory;
        }
    }

    public function AddEntry($difference, $name){
        $request = DB::getInstance()->prepare("INSERT INTO history (difference, history_product_name)
                                                        VALUES (:difference, :name)");
        $request->bindParam(':difference', $difference);
        $request->bindParam(':name', $name);
        $request->execute();
    }
}