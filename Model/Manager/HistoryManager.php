<?php

namespace Controller;

use Model\DB;
use Model\Entity\History;
use Model\Manager\Traits\ManagerTrait;

class HistoryManager{

    use ManagerTrait;

    /**
     * Return all the history
     * @return array
     */
    public function getHistory(): array{
        $request = DB::getRepresentative()->prepare("SELECT * FROM history");
        if ($request->execute()){
            $historyData = $request->fetchAll();
            foreach ($historyData as $data){
                $totalHistory[] = new History($data['date'], $data['difference'], $data['history_product_name']);
            }

            return $totalHistory;
        }
    }

    /**
     * Add into the data base a new change in the stock
     * @param $difference
     * @param $name
     */
    public function AddEntry($difference, $name){
        $request = DB::getRepresentative()->prepare("INSERT INTO history (difference, history_product_name)
                                                        VALUES (:difference, :name)");
        $request->bindParam(':difference', $difference);
        $request->bindParam(':name', $name);
        $request->execute();
    }
}