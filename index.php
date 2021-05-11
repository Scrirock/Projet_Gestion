<?php

use Controller\HomeController;
use Controller\PageController;
use Controller\UserController;

require_once './Model/DB.php';
require_once './Model/Manager/Traits/ManagerTrait.php';
require_once './Controller/Traits/RenderViewTrait.php';

require_once './Model/Manager/UserManager.php';

require_once './Controller/HomeController.php';
require_once './Controller/PageController.php';
require_once './Controller/UserController.php';

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();

if(isset($_GET['controller'])) {
    switch ($_GET['controller']){
        case 'connexion':
            $controller = new UserController();
            $controller->connexion($_POST);
            break;
        case 'achievement':
            $controller = new PageController();
            $controller->achievement();
            break;
    }
}
else {
    $controller = new HomeController();
    $controller->homePage();
}