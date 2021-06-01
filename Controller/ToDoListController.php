<?php


namespace Controller;


use Controller\Traits\RenderViewTrait;
use Model\DB;
use Model\Entity\ToDoList;
use Model\User\ListManager;

class ToDoListController{

    use RenderViewTrait;

    public function toDoList(){
        $this->render('todoList', 'Chose à faire', [
            'list' => (new ListManager())->getAll()
        ]);
    }

    public function modifyList($fields, $id){
        if(isset($fields['title'], $fields['content'])) {
            $title = (new DB())->sanitize($fields['title']);
            $content = (new DB())->sanitize($fields['content']);

            $listObject = new ToDoList($id, $title, $content);
            (new ListManager())->modifyList($listObject);
        }

        $this->render('modify.list', "Modifier une liste de chose à faire", [
            'value' => (new ListManager())->getById($id)
        ]);
    }

    /**
     * Delete a to do list by it's id
     * @param $id
     */
    public function deleteList($id){
        (new ListManager())->deleteList($id);
    }

    public function addList($fields){
        if(isset($fields['title'], $fields['content'])) {
            $title = (new DB())->sanitize($fields['title']);
            $content = (new DB())->sanitize($fields['content']);

            $listObject = new ToDoList(null, $title, $content);
            (new ListManager())->addList($listObject);
        }

        $this->render('add.list', "Ajouter une liste de chose à faire");
    }
}