<?php


namespace Controller;

use Controller\Traits\RenderViewTrait;
use Model\stock\CategoryManager;
use Model\stock\StockManager;
use Model\User\UserManager;

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

        $this->render('category', 'Catégorie', [
            'stock' => (new StockManager())->getAll(),
            'category' => (new CategoryManager())->getCategory()
        ]);
    }

    /**
     * Show the theme page
     */
    public function theme(){
        $this->render('theme', 'Thème');
    }

    /**
     * Show the admin zone page
     */
    public function adminPanel(){
        $this->render('adminPanel', 'Admin Zone', [
            'user' => (new UserManager())->getAll()
        ]);
    }
}