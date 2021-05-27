<?php

namespace Controller;

use Controller\Traits\RenderViewTrait;
use Model\Entity\User;
use Model\User\UserManager;
use Model\DB;

class UserController{

    use RenderViewTrait;

    public function connexion($fields){
        if (isset($fields['name'], $fields['password'])){
            $name = (new DB)->sanitize($fields['name']);
            $password = (new DB)->sanitize($fields['password']);

            $checkAccount = (new UserManager)->checkUser($name, $password);
            if ($checkAccount){
                $checkRole = (new UserManager)->checkRole($name);
                switch ($checkRole){
                    case 1:
                        session_start();
                        $_SESSION["role"] = "admin";
                        $_SESSION["name"] = $name;
                        header("Location: /");
                        exit;
                    case 2:
                        session_start();
                        $_SESSION["role"] = "director";
                        $_SESSION["name"] = $name;
                        header("Location: /");
                        exit;
                    case 3:
                        session_start();
                        $_SESSION["role"] = "worker";
                        $_SESSION["name"] = $name;
                        header("Location: /");
                        exit;
                    case 4:
                        session_start();
                        $_SESSION["role"] = "cook";
                        $_SESSION["name"] = $name;
                        header("Location: /");
                        exit;
                    case 5:
                        session_start();
                        $_SESSION["role"] = "cleaner";
                        $_SESSION["name"] = $name;
                        header("Location: /");
                        exit;
                    default:
                        session_start();
                        $_SESSION["role"] = "guest";
                        $_SESSION["name"] = $name;
                        header("Location: /");
                        exit;
                }
            }
            else{
                session_start();
                $_SESSION["error"] = "Mot de passe ou Pseudo incorrect";
                header("Location: /?controller=connexion");
                exit;
            }
        }

        $this->render('connexion', 'Connexion');
    }

    public function addUser($fields){
        $db = new DB();
        if(isset($fields['username'], $fields['password'])) {
            $username = $db->sanitize($fields['username']);
            $password = password_hash($db->sanitize($fields['password']), PASSWORD_BCRYPT);

            $userObject = new User($username, $password);
            (new UserManager())->addUser($userObject);
        }

        $this->render('add.user', "S'inscrire");
    }

    public function modifyUser($fields, $id){
        if(isset($fields['role'], $fields['name'])) {
            $role = (new DB())->sanitize($fields['role']);
            $name = (new DB())->sanitize($fields['name']);

            $userObject = new User($name, null, $role, $id);
            (new UserManager())->modifyUser($userObject);
        }

        $this->render('modify.user', "Modifier un utilisateur", [
            'value' => (new UserManager())->getById($id)
        ]);
    }

    public function deleteUser($id){
        (new UserManager())->deleteUser($id);
    }
}