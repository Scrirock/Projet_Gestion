<?php


namespace Controller;

use Controller\Traits\RenderViewTrait;
use Model\stock\StockManager;

class PageController{

    use RenderViewTrait;

    /**
     * Show the achievement page
     */
    public function achievement() {
        $this->render('achievement', 'Haut fait');
    }

    /**
     * Show a tree of category and product
     * @param $field
     */
    public function category($field) {
        $manager = new StockManager();
        if (!empty($field)){
            $productArray = $field;
            $manager->deductProduct($productArray);
        }
        $stock = $manager->getAll();
        $category = $manager->getCategory();
        $this->render('category', 'Catégorie', [
            'stock' => $stock,
            'category' => $category
        ]);
    }

    public function theme(){
        $this->render('theme', 'Thème');
    }
}