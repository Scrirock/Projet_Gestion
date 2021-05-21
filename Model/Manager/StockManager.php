<?php


namespace Model\stock;


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
                                                           s.stock, s.location2,
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

    public function getCategory(): array{
        $request = DB::getInstance()->prepare("SELECT * FROM category");
        if ($request->execute()){
            return $request->fetchAll();
        }
    }

    public function getOne(int $id): array{
        $request = DB::getInstance()->prepare("SELECT * FROM stock 
                                                     INNER JOIN category 
                                                        ON stock.fk_category = category.id
                                                     WHERE stock.id = :id");
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
        $request->bindParam(":location2", $location2);
        $request->bindParam(":id", $id);

        $request->execute();

        header("Location: /");
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
        $location2 = $stockObject->getLocation2();

        $request->bindParam(":name", $name);
        $request->bindParam(":category", $category);
        $request->bindParam(":description", $description);
        $request->bindParam(":condition", $condition);
        $request->bindParam(":reference", $reference);
        $request->bindParam(":location", $location);
        $request->bindParam(":provider", $provider);
        $request->bindParam(":stock", $stock);
        $request->bindParam(":location2", $location2);

        $request->execute();

        header("Location: /");
    }

    public function deductProduct($productArray){
        foreach ($productArray as $key => $value){
            $request = DB::getInstance()->prepare("SELECT stock FROM stock 
                                                            WHERE product_name = :name");
            $key = str_replace("_", " ", $key);
            $request->bindParam(":name", $key);
            $request->execute();
            $stock = $request->fetch();

            $request = DB::getInstance()->prepare("UPDATE stock SET stock = :newStock 
                                                            WHERE product_name = :name");
            $newValue = intval(intval($stock['stock']) - intval($value));
            $request->bindParam(":newStock", $newValue);
            $request->bindParam(":name", $key);
            if ($newValue < 0){
                header("Location: /?controller=category&error");
            }
            else{
                $request->execute();
                header("Location: /?controller=category");
            }
        }
    }
}