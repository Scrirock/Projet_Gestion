<?php


namespace Model\stock;


use Controller\HistoryManager;
use Model\DB;
use Model\Entity\Stock;
use Model\Manager\Traits\ManagerTrait;

class StockManager{

    use ManagerTrait;

    public function getAll(): array{
        $request = DB::getInstance()->prepare("SELECT 
                                                           s.id as sid, s.fk_category,
                                                           s.product_name, s.description,
                                                           s.fk_condition, s.reference,
                                                           s.location, s.fk_provider,
                                                           s.stock, s.location2, s.stockMin,
                                                           c.id as cid, c.name as cname,
                                                           e.id as condId, e.condition_name,
                                                           pro.id as proId, pro.provider_name 
                                                      FROM stock as s
                                                        INNER JOIN category as c
                                                            ON s.fk_category = c.id
                                                        INNER JOIN etat as e
                                                            ON s.fk_condition = e.id
                                                        INNER JOIN provider as pro
                                                            ON s.fk_provider = pro.id");
        if ($request->execute()){
            return $request->fetchAll();
        }
    }

    public function getOne(int $id): array{
        $request = DB::getInstance()->prepare("SELECT 
                                                           s.id as sid, s.fk_category,
                                                           s.product_name, s.description,
                                                           s.fk_condition, s.reference,
                                                           s.location, s.fk_provider,
                                                           s.stock, s.location2, s.stockMin,
                                                           c.id as cid, c.name as cname,
                                                           e.id as condId, e.condition_name,
                                                           pro.id as proId, pro.provider_name 
                                                      FROM stock as s
                                                        INNER JOIN category as c
                                                            ON s.fk_category = c.id
                                                        INNER JOIN etat as e
                                                            ON s.fk_condition = e.id
                                                        INNER JOIN provider as pro
                                                            ON s.fk_provider = pro.id
                                                      WHERE s.id = :id");
        $request->bindParam(':id', $id);
        if ($request->execute()){
            return $request->fetchAll();
        }
    }

    /**
     * Modify a product of the database
     * @param Stock $stockObject
     */
    public function modify(Stock $stockObject){
        $request = DB::getInstance()->prepare("
            UPDATE stock 
            SET product_name = :name, 
                fk_category = :category, 
                description = :description, 
                fk_condition = :condition, 
                reference = :reference, 
                location = :location, 
                fk_provider = :provider, 
                stock = :stock,
                stockMin = :stockMin,
                location2 = :location2
            WHERE id = :id
        ");

        $name = $stockObject->getName();
        $category = $stockObject->getCategory();
        $description = $stockObject->getDescription();
        $condition = $stockObject->getCondition();
        $reference = $stockObject->getReference();
        $location = $stockObject->getLocation();
        $provider = $stockObject->getProvider();
        $stock = $stockObject->getStock();
        $stockMin = $stockObject->getStockMin();
        $location2 = $stockObject->getLocation2();
        $id = $stockObject->getId();

        $request->bindParam(":name", $name);
        $request->bindParam(":category", $category);
        $request->bindParam(":description", $description);
        $request->bindParam(":condition", $condition);
        $request->bindParam(":reference", $reference);
        $request->bindParam(":location", $location);
        $request->bindParam(":provider", $provider);
        $request->bindParam(":stock", $stock);
        $request->bindParam(":stockMin", $stockMin);
        $request->bindParam(":location2", $location2);
        $request->bindParam(":id", $id);

        $request->execute();

        header("Location: /?controller=category");
    }

    /**
     * add a product into the database
     * @param Stock $stockObject
     */
    public function add(Stock $stockObject){
        $request = DB::getInstance()->prepare("
            INSERT INTO stock (
                               product_name,
                               fk_category,
                               description,
                               fk_condition,
                               reference,
                               location,
                               fk_provider,
                               stock,
                               stockMin,
                               location2
                               )
                VALUES (
                        :name, 
                        :category, 
                        :description, 
                        :condition, 
                        :reference, 
                        :location, 
                        :provider, 
                        :stock,
                        :stockMin,
                        :location2
                        )
        ");

        $name = $stockObject->getName();
        $category = $stockObject->getCategory();
        $description = $stockObject->getDescription();
        $condition = $stockObject->getCondition();
        $reference = $stockObject->getReference();
        $location = $stockObject->getLocation();
        $provider = $stockObject->getProvider();
        $stock = $stockObject->getStock();
        $stockMin = $stockObject->getStockMin();
        $location2 = $stockObject->getLocation2();

        $request->bindParam(":name", $name);
        $request->bindParam(":category", $category);
        $request->bindParam(":description", $description);
        $request->bindParam(":condition", $condition);
        $request->bindParam(":reference", $reference);
        $request->bindParam(":location", $location);
        $request->bindParam(":provider", $provider);
        $request->bindParam(":stock", $stock);
        $request->bindParam(":stockMin", $stockMin);
        $request->bindParam(":location2", $location2);

        $request->execute();

        header("Location: /");
    }

    public function deductProduct($productArray){
        foreach ($productArray as $key => $value){
            if ($value > 0){
                $action = "nothing";
                if ($key[0] === "-"){
                    $action = "subtraction";
                }
                elseif ($key[0] === "+"){
                    $action = "addition";
                }
                $key = substr($key, 1);

                $request = DB::getInstance()->prepare("SELECT stock FROM stock
                                                            WHERE product_name = :name");
                $key = str_replace("_", " ", $key);
                $request->bindParam(":name", $key);
                $request->execute();
                $stock = $request->fetch();

                $request = DB::getInstance()->prepare("UPDATE stock SET stock = :newStock
                                                            WHERE product_name = :name");
                if ($action === "subtraction"){
                    $newValue = intval(intval($stock['stock']) - intval($value));
                    (new HistoryManager())->AddEntry(-intval($value), $key);
                }
                elseif ($action === "addition"){
                    $newValue = intval(intval($stock['stock']) + intval($value));
                    (new HistoryManager())->AddEntry(intval($value), $key);
                }
                else{
                    $newValue = intval(intval($stock['stock']));
                }
                $request->bindParam(":newStock", $newValue);
                $request->bindParam(":name", $key);
                if ($newValue < 0){
                    $request->execute();
                    header("Location: /?controller=category&error");
                }
                else{
                    $request->execute();
                    header("Location: /?controller=category");
                }
            }
        }
    }

    /**
     * @return array
     */
    public function getStock(): array{
        $totalStock = [];
        $request = DB::getInstance()->prepare("SELECT product_name, stock, stockMin FROM stock");
        $request->execute();

        $stockData = $request->fetchAll();
        foreach ($stockData as $data){
            $totalStock[] = new Stock($data['stock'], $data['product_name'], $data['stockMin']);
        }

        return $totalStock;
    }

    public function deleteProduct($id){
        $request = DB::getInstance()->prepare("DELETE FROM stock WHERE id = :id");
        $request->bindParam(':id', $id);
        $request->execute();
        header("Location: /?controller=category");
    }

    public function getBySearch($data): array{
        $request = DB::getInstance()->prepare("SELECT 
                                                           s.id as sid, s.fk_category,
                                                           s.product_name, s.description,
                                                           s.fk_condition, s.reference,
                                                           s.location, s.fk_provider,
                                                           s.stock, s.location2, s.stockMin,
                                                           c.id as cid, c.name as cname,
                                                           e.id as condId, e.condition_name,
                                                           pro.id as proId, pro.provider_name 
                                                      FROM stock as s
                                                        INNER JOIN category as c
                                                            ON s.fk_category = c.id
                                                        INNER JOIN etat as e
                                                            ON s.fk_condition = e.id
                                                        INNER JOIN provider as pro
                                                            ON s.fk_provider = pro.id
                                                      WHERE s.product_name LIKE :search");
        $search = "%".$data."%";
        $request->bindParam(':search', $search);
        if ($request->execute()){
            return $request->fetchAll();
        }
    }
}