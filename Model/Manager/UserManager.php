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
        $request = DB::getInstance()->prepare("SELECT id, username FROM user WHERE id = :user_fk");
        $request->bindValue(':user_fk', $id);
        $result = $request->execute();
        if($result) {
            $user_data = $request->fetch();
            if($user_data) {
                $user->setId($user_data['id']);
                $user->setPassword('');
                $user->setName($user_data['name']);
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
        $request = DB::getInstance()->prepare("SELECT id, name FROM user WHERE username = :name");
        $request->bindValue(':name', $name);
        $result = $request->execute();
        if($result) {
            $user_data = $request->fetch();
            if($user_data) {
                $user->setId($user_data['id']);
                $user->setPassword('');
                $user->setName($user_data['name']);
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
        $request = DB::getInstance()->prepare("SELECT * FROM user WHERE username = :name");
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
     * Return true if the user is admin
     * @param $name
     * @return bool
     */
    public function checkRole($name): bool{
        $request = DB::getInstance()->prepare("SELECT * FROM user WHERE username = :name");
        $request->bindValue(':name', $name);

        if($request->execute()) {
            $userData = $request->fetch();
            if($userData["role"] === "1") {
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
}