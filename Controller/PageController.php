<?php


namespace Controller;

use Controller\Traits\RenderViewTrait;
use Model\stock\CategoryManager;
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
        if (!empty($field)){
            $productArray = $field;
            (new StockManager())->deductProduct($productArray);
        }
        $stock = (new StockManager())->getAll();
        $category = (new CategoryManager())->getCategory();
        $this->render('category', 'Catégorie', [
            'stock' => $stock,
            'category' => $category
        ]);
    }

    public function theme(){
        $this->render('theme', 'Thème');
    }
}