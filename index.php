<?php

use Controller\CategoryController;
use Controller\HomeController;
use Controller\PageController;
use Controller\StockController;
use Controller\ToDoListController;
use Controller\UserController;

require_once './Model/DB.php';
require_once './Model/Manager/Traits/ManagerTrait.php';
require_once './Controller/Traits/RenderViewTrait.php';

require_once './Model/Manager/UserManager.php';
require_once './Model/Manager/StockManager.php';
require_once './Model/Manager/CategoryManager.php';
require_once './Model/Manager/HistoryManager.php';
require_once './Model/Manager/ListManager.php';

require_once './Controller/HomeController.php';
require_once './Controller/PageController.php';
require_once './Controller/UserController.php';
require_once './Controller/StockController.php';
require_once './Controller/CategoryController.php';
require_once './Controller/HistoryController.php';
require_once './Controller/ToDoListController.php';

require_once './Model/Entity/User.php';
require_once './Model/Entity/Stock.php';
require_once './Model/Entity/Category.php';
require_once './Model/Entity/History.php';
require_once './Model/Entity/ToDoList.php';

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
            $controller->category($_POST);
            break;
        case 'modifyProduct':
            $controller = new StockController();
            if (isset($_GET['id'])){
                $controller->modify($_POST, $_GET['id']);
            }
            break;
        case 'deleteProduct':
            $controller = new StockController();
            if (isset($_GET['id'])){
                $controller->delete($_GET['id']);
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
        case 'modifyCategory':
            $controller = new CategoryController();
            if (isset($_GET['id'])){
                $controller->modify($_POST, $_GET['id']);
            }
            break;
        case 'deleteCategory':
            $controller = new CategoryController();
            if (isset($_GET['id'])){
                $controller->delete($_GET['id']);
            }
            break;
        case 'addCategory':
            $controller = new CategoryController();
            $controller->add($_POST);
            break;
        case 'addUser':
            $controller = new UserController();
            $controller->addUser($_POST);
            break;
        case 'modifyUser':
            $controller = new UserController();
            if (isset($_GET['id'])){
                $controller->modifyUser($_POST, $_GET['id']);
            }
            break;
        case 'deleteUser':
            $controller = new UserController();
            if (isset($_GET['id'])){
                $controller->deleteUser($_GET['id']);
            }
            break;
        case 'adminPanel':
            $controller = new PageController();
            $controller->adminPanel();
            break;
        case 'search':
            $controller = new StockController();
            if (isset($_GET['r'])){
                $controller->getBySearch($_GET['r']);
            }
        case 'toDoList':
            $controller = new ToDoListController();
            $controller->toDoList();
            break;
        case 'modifyList':
            $controller = new ToDoListController();
            if (isset($_GET['id'])){
                $controller->modifyList($_POST, $_GET['id']);
            }
            break;
        case 'deleteList':
            $controller = new ToDoListController();
            if (isset($_GET['id'])){
                $controller->deleteList($_GET['id']);
            }
            break;
        case 'addList':
            $controller = new ToDoListController();
            $controller->addList($_POST);
            break;
    }
}
else {
    $controller = new HomeController();
    $controller->homePage();
}