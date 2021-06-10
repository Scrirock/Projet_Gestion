<?php

namespace Model\User;

use Model\DB;
use Model\Entity\User;
use Model\Manager\Traits\ManagerTrait;

class UserManager {

    use ManagerTrait;

    /**.
     * Return an user by it's ID
     * @param int $id
     * @return User
     */
    public function getById(int $id): User {
        $user = new User();
        $request = DB::getRepresentative()->prepare("SELECT id, username FROM user WHERE id = :id");
        $request->bindValue(':id', $id);
        $result = $request->execute();
        if($result) {
            $useData = $request->fetch();
            if($useData) {
                $user->setId($useData['id']);
                $user->setPassword('');
                $user->setName($useData['username']);
            }
        }
        return $user;
    }

    /**
     * Return an user by it's name
     * @param string $name
     * @return User
     */
    public function getByName(string $name): User {
        $user = new User();
        $request = DB::getRepresentative()->prepare("SELECT id, username FROM user WHERE username = :name");
        $request->bindValue(':name', $name);
        $result = $request->execute();
        if($result) {
            $useData = $request->fetch();
            if($useData) {
                $user->setId($useData['id']);
                $user->setPassword('');
                $user->setName($useData['username']);
            }
        }
        return $user;
    }

    /**
     * Return true if the user exist and the password is correct
     * @param $name
     * @param $password
     * @return bool
     */
    public function checkUser($name, $password): bool{
        $request = DB::getRepresentative()->prepare("SELECT * FROM user WHERE username = :name");
        $request->bindValue(':name', $name);

        if($request->execute()) {
            $userData = $request->fetch();
            if(password_verify($password, $userData["password"])) {
                return true;
            }
            else {
                return false;
            }
        }
        else {
            return false;
        }
    }

    /**
     * Return the role of an user
     * @param $name
     * @return int
     */
    public function checkRole($name): int{
        $request = DB::getRepresentative()->prepare("SELECT * FROM user WHERE username = :name");
        $request->bindValue(':name', $name);

        if($request->execute()) {
            $userData = $request->fetch();
            return $userData['role_fk'];
        }
    }

    /**
     * Avoid an user to have the same pseudo of another one
     * @param $name
     * @return bool
     */
    public function checkUserName($name): bool{
        $request = DB::getRepresentative()->prepare("SELECT username FROM user");
        $request->execute();
        $check = true;

        $userData = $request->fetchAll();
        foreach ($userData as $username){
            if ($username['username'] === $name){
                $check = false;
            }
        }
        return $check;
    }

    /**
     * Add a user into the database
     * @param User $user
     */
    public function addUser(User $user){
        session_start();
        if ($this->checkUserName($user->getName())){
            $request = DB::getRepresentative()->prepare("
            INSERT INTO user (role_fk, username, password)
                VALUES (:role, :username, :password)
            ");

            $role = $user->getRole();
            $username = $user->getName();
            $password = $user->getPassword();

            $request->bindParam(":role", $role);
            $request->bindParam(":username", $username);
            $request->bindParam(":password", $password);
            if ($request->execute()){
                $_SESSION["role"] = "guest";
                $_SESSION["name"] = $username;
                header("Location: /");
            }
            else{
                $_SESSION["error?"] = "Une erreur est survenu, veuillez réessayer";
                header("Location: /?controller=addUser");
            }
        }
        else{
            $_SESSION["error?"] = "Ce nom d'utilisateur est deja prit";
            header("Location: /?controller=addUser");
        }
    }

    /**
     * Modify an user
     * @param User $user
     */
    public function modifyUser(User $user){
        if ($this->checkUserName($user->getName())) {
            $request = DB::getRepresentative()->prepare("
            UPDATE user SET role_fk = :role,
                            username = :username  
                        WHERE id = :id 
        ");

            $role = $user->getRole();
            $username = $user->getName();
            $id = $user->getId();

            $request->bindParam(":role", $role);
            $request->bindParam(":username", $username);
            $request->bindParam(":id", $id);

            if ($request->execute()) {
                header("Location: /?controller=adminPanel");
            }
            else {
                session_start();
                $_SESSION["error"] = "Une erreur est survenu, veuillez réessayer";
                header("Location: /?controller=adminPanel");
            }
        }
        else{
            session_start();
            $_SESSION["error?"] = "Ce nom d'utilisateur est deja prit";
            header("Location: /?controller=adminPanel");
        }
    }

    /**
     * Delete an user
     * @param $id
     */
    public function deleteUser($id){
        $request = DB::getRepresentative()->prepare("DELETE FROM user WHERE id = :id");
        $request->bindParam(':id', $id);
        $request->execute();
        header("Location: /?controller=adminPanel");
    }

    /**
     * Return all the user
     * @return array
     */
    public function getAll(): array{
        $request = DB::getRepresentative()->prepare("
            SELECT u.id as uid,
                   u.username, u.role_fk,
                   r.id as rid,
                   r.role_name as role
                FROM user as u INNER JOIN role as r ON role_fk = r.id");
        if($request->execute()) {
            return $request->fetchAll();
        }
    }
}