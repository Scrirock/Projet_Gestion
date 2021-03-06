<?php


namespace Model\stock;


use Model\DB;
use Model\Entity\Category;
use Model\Manager\Traits\ManagerTrait;

class CategoryManager{

    use ManagerTrait;

    /**
     * Return one category
     * @param int $id
     * @return array
     */
    public function getACat(int $id): array{
        $request = DB::getRepresentative()->prepare("SELECT * FROM category WHERE id = :id");
        $request->bindParam(':id', $id);
        if ($request->execute()){
            return $request->fetchAll();
        }
    }

    /**
     * Modify a category
     * @param Category $categoryObject
     */
    public function modify(Category $categoryObject){
        $request = DB::getRepresentative()->prepare("
            UPDATE category SET name = :name WHERE id = :id
        ");

        $name = $categoryObject->getName();
        $id = $categoryObject->getId();

        $request->bindParam(":name", $name);
        $request->bindParam(":id", $id);

        $request->execute();

        header("Location: /?controller=category");
    }

    /**
     * add a category into the database
     * @param Category $categoryObject
     */
    public function add(Category $categoryObject){
        $request = DB::getRepresentative()->prepare("
            INSERT INTO category (name)
                VALUES (:name)
        ");

        $name = $categoryObject->getName();
        $request->bindParam(":name", $name);

        $request->execute();

        header("Location: /");
    }

    /**
     * Delete a category by it's id
     * @param $id
     */
    public function deleteCategory($id){
        $request = DB::getRepresentative()->prepare("DELETE FROM category WHERE id = :id");
        $request->bindParam(':id', $id);
        $request->execute();
        header("Location: /?controller=category");
    }

    /**
     * Return all the category
     * @return array
     */
    public function getCategory(): array{
        $request = DB::getRepresentative()->prepare("SELECT * FROM category");
        if ($request->execute()){
            return $request->fetchAll();
        }
    }
}