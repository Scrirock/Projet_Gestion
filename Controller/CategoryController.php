<?php

namespace Controller;


use Controller\Traits\RenderViewTrait;
use Model\DB;
use Model\Entity\Category;
use Model\stock\CategoryManager;

class CategoryController{

    use RenderViewTrait;

    public function modify($fields, $id){
        $categoryManager = new CategoryManager();
        if(isset($fields['name'])) {
            $name = (new DB())->sanitize($fields['name']);

            $categoryObject = new Category($name, $id);
            $categoryManager->modify($categoryObject);
        }

        $category = $categoryManager->getACat($id);
        $this->render('modify.category', 'Modifier une catégorie', [
            'value'=> $category
        ]);
    }

    public function add($fields){
        $categoryManager = new CategoryManager();
        if(isset($fields['name'])) {
            $name = (new DB())->sanitize($fields['name']);

            $categoryObject = new Category($name);
            $categoryManager->add($categoryObject);
        }

        $this->render('add.category', 'Ajouter une catégorie');
    }

    public function delete($id){
        (new CategoryManager())->deleteCategory($id);
    }
}