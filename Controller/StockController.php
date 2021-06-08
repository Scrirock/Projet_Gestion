<?php


namespace Controller;


use Controller\Traits\RenderViewTrait;
use Model\DB;
use Model\Entity\Stock;
use Model\stock\StockManager;

class StockController{

    use RenderViewTrait;

    /**
     * Modify a product by it's id
     * @param $fields
     * @param $id
     */
    public function modify($fields, $id){
        $stockManager = new StockManager();
        $db = new DB();
        if(isset($fields['stockMin'], $fields['name'], $fields['reference'], $fields['category'], $fields['description'], $fields['condition'], $fields['provider'], $fields['location'], $fields['location2'],)) {
            $stockMin = $db->sanitize($fields['stockMin']);
            $name = $db->sanitize($fields['name']);
            $reference = $db->sanitize($fields['reference']);
            $category = $db->sanitize($fields['category']);
            $description = $db->sanitize($fields['description']);
            $condition = $db->sanitize($fields['condition']);
            $provider = $db->sanitize($fields['provider']);
            $location = $db->sanitize($fields['location']);
            $location2 = $db->sanitize($fields['location2']);

            $stockObject = new Stock(null, $name, $stockMin, $reference, $category, $description, $condition, $provider, $location, $location2, $id);
            $stockManager->modify($stockObject);
        }

        $stock = $stockManager->getOne($id);
        $this->render('modify.stock', 'Modifier le stock', [
            'value'=> $stock
        ]);
    }

    /**
     * Add a product
     * @param $fields
     */
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

    /**
     * Delete a product by it's id
     * @param $id
     */
    public function delete($id){
        if(isset($_SESSION['role']) && $_SESSION['role'] === "admin") {
            (new StockManager())->deleteProduct($id);
        }
        else{
            header("Location: /");
        }
    }

    /**
     * Show a list of any product asked from the search bar
     * @param $data
     */
    public function getBySearch($data){
        $this->render('search', 'Liste des produits demandé', [
            'value'=> (new StockManager())->getBySearch($data),
            'search' => $data
        ]);
    }
}