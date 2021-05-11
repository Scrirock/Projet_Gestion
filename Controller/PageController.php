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
}