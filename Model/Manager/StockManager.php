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
                                                           s.nom, s.description,
                                                           s.etat, s.reference,
                                                           s.localisation, s.fournisseur,
                                                           s.stock, s.loca2oO,
                                                           c.id as cid, c.name
                                                      FROM stock as s
                                                        INNER JOIN category as c
                                                            ON s.fk_category = c.id");
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
            SET nom = :name, 
                fk_category = :category, 
                description = :description, 
                etat = :condition, 
                reference = :reference, 
                localisation = :location, 
                fournisseur = :provider, 
                stock = :stock, 
                loca2oO = :location2
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
                               nom,
                               fk_category,
                               description,
                               etat,
                               reference,
                               localisation,
                               fournisseur,
                               stock,
                               loca2oO
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
}