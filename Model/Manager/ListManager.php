<?php


namespace Model\User;


use Model\DB;
use Model\Entity\ToDoList;
use Model\Manager\Traits\ManagerTrait;

class ListManager{

    use ManagerTrait;

    /**
     * Return the to do list
     * @return array
     */
    public function getAll(): array{
        $list = [];
        $request = DB::getRepresentative()->prepare("SELECT * FROM todo_list");
        $request->execute();
        $data = $request->fetchAll();
        foreach ($data as $element){
            $list[] = new ToDoList($element["id"], $element["title"], $element["content"]);
        }
        return $list;
    }

    public function getById($id): array{
        $request = DB::getRepresentative()->prepare("SELECT * FROM todo_list WHERE id = :id");
        $request->bindValue(':id', $id);
        $request->execute();

        return $request->fetch();
    }

    public function modifyList(ToDoList $listObject){
        $request = DB::getRepresentative()->prepare("
            UPDATE todo_list SET title = :title,
                            content = :content  
                        WHERE id = :id 
        ");

        $title = $listObject->getTitle();
        $content = $listObject->getContent();
        $id = $listObject->getId();

        $request->bindParam(":title", $title);
        $request->bindParam(":content", $content);
        $request->bindParam(":id", $id);

        if ($request->execute()){
            header("Location: /?controller=toDoList");
        }
    }

    public function deleteList($id){
        $request = DB::getRepresentative()->prepare("DELETE FROM todo_list WHERE id = :id");
        $request->bindParam(':id', $id);
        $request->execute();
        header("Location: /?controller=toDoList");
    }

    public function addList(ToDoList $listObject){
        $request = DB::getRepresentative()->prepare("INSERT INTO todo_list (title, content) 
                                                        VALUES (:title, :content)");

        $title = $listObject->getTitle();
        $content = $listObject->getContent();

        $request->bindParam(":title", $title);
        $request->bindParam(":content", $content);

        if ($request->execute()){
            header("Location: /?controller=toDoList");
        }
    }

}