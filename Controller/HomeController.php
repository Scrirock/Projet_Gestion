<?php

namespace Controller;

use Controller\Traits\RenderViewTrait;

class HomeController {

    use RenderViewTrait;

    /**
     * Show the home page
     */
    public function homePage() {
        $this->render('home', 'Gestion Stock');
    }

}