<?php

use Controller\HomeController;
use Controller\PageController;
use Controller\StockController;
use Controller\UserController;

require_once './Model/DB.php';
require_once './Model/Manager/Traits/ManagerTrait.php';
require_once './Controller/Traits/RenderViewTrait.php';

require_once './Model/Manager/UserManager.php';
require_once './Model/Manager/StockManager.php';

require_once './Controller/HomeController.php';
require_once './Controller/PageController.php';
require_once './Controller/UserController.php';
require_once './Controller/StockController.php';

require_once './Model/Entity/Stock.php';

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
        case 'category':
            $controller = new PageController();
            $controller->category();
            break;
        case 'modifyCard':
            $controller = new StockController();
            if (isset($_GET['id'])){
                $controller->modify($_POST, $_GET['id']);
            }
            else{
                $controller->modify($_POST,1);
            }
            break;
        case 'addStock':
            $controller = new StockController();
            $controller->add($_POST);
            break;
        case 'theme':
            $controller = new PageController();
            $controller->theme();
            break;
    }
}
else {
    $controller = new HomeController();
    $controller->homePage();
}