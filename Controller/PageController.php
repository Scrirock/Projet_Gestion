<?php


namespace Controller;


use Controller\Traits\RenderViewTrait;

class PageController{

    use RenderViewTrait;

    /**
     * Show the achievement page
     */
    public function achievement() {
        $this->render('achievement', 'Haut fait');
    }

    /**
     * Show the form to change stock
     */
    public function category() {
        $this->render('category', 'Catégorie');
    }

    public function theme(){
        $this->render('theme', 'Thème');
    }
}