<?php

namespace Controller;

use Controller\Traits\RenderViewTrait;
use Model\stock\StockManager;

class HomeController {

    use RenderViewTrait;

    /**
     * Show the home page
     */
    public function homePage() {
        $manager = new StockManager();
        $stock = $manager->getAll();

        $this->render('home', 'Gestion Stock', [
            'stock' => $stock
        ]);
    }

}