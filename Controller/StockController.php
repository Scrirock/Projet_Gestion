<?php


namespace Controller;


use Controller\Traits\RenderViewTrait;
use Model\DB;
use Model\Entity\Stock;
use Model\stock\StockManager;

class StockController{

    use RenderViewTrait;

    public function addStock(){

    }

    public function modify($fields, $id){
        $stockManager = new StockManager();
        $db = new DB();
        if(isset($fields['stock'], $fields['name'], $fields['reference'], $fields['category'], $fields['description'], $fields['condition'], $fields['provider'], $fields['location'], $fields['location2'],)) {
            $stock = $db->sanitize($fields['stock']);
            $name = $db->sanitize($fields['name']);
            $reference = $db->sanitize($fields['reference']);
            $category = $db->sanitize($fields['category']);
            $description = $db->sanitize($fields['description']);
            $condition = $db->sanitize($fields['condition']);
            $provider = $db->sanitize($fields['provider']);
            $location = $db->sanitize($fields['location']);
            $location2 = $db->sanitize($fields['location2']);

            $stockObject = new Stock($stock, $name, $reference, $category, $description, $condition, $provider, $location, $location2, $id);
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
        if(isset($fields['stock'], $fields['name'], $fields['reference'], $fields['category'], $fields['description'], $fields['condition'], $fields['provider'], $fields['location'], $fields['location2'],)) {
            $stock = $db->sanitize($fields['stock']);
            $name = $db->sanitize($fields['name']);
            $reference = $db->sanitize($fields['reference']);
            $category = $db->sanitize($fields['category']);
            $description = $db->sanitize($fields['description']);
            $condition = $db->sanitize($fields['condition']);
            $provider = $db->sanitize($fields['provider']);
            $location = $db->sanitize($fields['location']);
            $location2 = $db->sanitize($fields['location2']);

            $stockObject = new Stock($stock, $name, $reference, $category, $description, $condition, $provider, $location, $location2);
            $stockManager->add($stockObject);
        }

        $this->render('add.stock', 'Ajouter un produit');
    }
}