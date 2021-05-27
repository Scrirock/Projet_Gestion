<?php


namespace Controller;


use Controller\Traits\RenderViewTrait;
use Model\DB;
use Model\Entity\Stock;
use Model\stock\StockManager;

class StockController{

    use RenderViewTrait;

    public function modify($fields, $id){
        $stockManager = new StockManager();
        $db = new DB();
        if(isset($fields['stockMin'], $fields['stock'], $fields['name'], $fields['reference'], $fields['category'], $fields['description'], $fields['condition'], $fields['provider'], $fields['location'], $fields['location2'],)) {
            $stock = $db->sanitize($fields['stock']);
            $stockMin = $db->sanitize($fields['stockMin']);
            $name = $db->sanitize($fields['name']);
            $reference = $db->sanitize($fields['reference']);
            $category = $db->sanitize($fields['category']);
            $description = $db->sanitize($fields['description']);
            $condition = $db->sanitize($fields['condition']);
            $provider = $db->sanitize($fields['provider']);
            $location = $db->sanitize($fields['location']);
            $location2 = $db->sanitize($fields['location2']);

            $stockObject = new Stock($stock, $name, $stockMin, $reference, $category, $description, $condition, $provider, $location, $location2, $id);
            $stockManager->modify($stockObject);
        }

        $stock = $stockManager->getOne($id);
        $this->render('modify.stock', 'Modifier le stock', [
            'value'=> $stock
        ]);
    }

    public function add($fields){
        $stockManager = new StockManager();
        $db = new DB();
        if(isset($fields['stockMin'], $fields['stock'], $fields['name'], $fields['reference'], $fields['category'], $fields['description'], $fields['condition'], $fields['provider'], $fields['location'], $fields['location2'],)) {
            $stock = $db->sanitize($fields['stock']);
            $stockMin = $db->sanitize($fields['stockMin']);
            $name = $db->sanitize($fields['name']);
            $reference = $db->sanitize($fields['reference']);
            $category = $db->sanitize($fields['category']);
            $description = $db->sanitize($fields['description']);
            $condition = $db->sanitize($fields['condition']);
            $provider = $db->sanitize($fields['provider']);
            $location = $db->sanitize($fields['location']);
            $location2 = $db->sanitize($fields['location2']);

            $stockObject = new Stock($stock, $name, $stockMin, $reference, $category, $description, $condition, $provider, $location, $location2);
            $stockManager->add($stockObject);
        }

        $this->render('add.stock', 'Ajouter un produit');
    }

    public function delete($id){
        (new StockManager())->deleteProduct($id);
    }

    public function getOne($id){
        $this->render('oneProduct.stock', 'Un produit', [
            'value'=> (new StockManager())->getOne($id)
        ]);
    }

    public function getBySearch($data){
        $this->render('search', 'Liste des produit demandé', [
            'value'=> (new StockManager())->getBySearch($data)
        ]);
    }
}