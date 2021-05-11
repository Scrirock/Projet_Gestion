<?php

namespace Controller;

use Controller\Traits\RenderViewTrait;
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
                if ($checkRole){
                    session_start();
                    $_SESSION["user"] = "admin";
                    $_SESSION["name"] = $name;
                    header("Location: index.php");
                    exit;
                }
                else{
                    session_start();
                    $_SESSION["user"] = "user";
                    $_SESSION["name"] = $name;
                    header("Location: index.php");
                    exit;
                }
            }
            else{
                session_start();
                $_SESSION["error"] = "Mot de passe ou Pseudo incorrect";
                header("Location: index.php?controller=connexion");
                exit;
            }
        }

        $this->render('connexion', 'Connexion');
    }
}