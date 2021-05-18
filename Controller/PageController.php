<?php


namespace Controller;


use Controller\Traits\RenderViewTrait;

class PageController{

    use RenderViewTrait;

    /**
     * Show the achievement page
     */
    public function achievement() {
        $this->render('achievement', 'Achievement Page');
    }

    /**
     * Show the form to change stock
     */
    public function stock() {
        $this->render('stock', 'Stock Page');
    }
}