<?php

define('URLROOT', 'http://localhost:8888/fakestore_php');

// Models
require_once("models/Database.php");
require_once("models/Model.php");
require_once("models/LoginModel.php");
require_once("models/SignUpModel.php");
require_once("models/AdminModel.php");

// Viwes
require_once("views/View.php");
require_once("views/AboutView.php");
require_once("views/LoginView.php");
require_once("views/SignUpView.php");
require_once("views/AdminView.php");

// Controllers
require_once("controllers/IndexController.php");
require_once("controllers/AboutController.php");
require_once("controllers/LoginController.php");
require_once("controllers/SignUpController.php");
require_once("controllers/AdminController.php");

$database = new Database("webshopdb", "root", "root");

// Simple Router

// working with querystring and get info that we need to work with
// the first part of url after "fakestore_php" is controller name 
// and second part is the name of controller function
$requestUrl = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
$requestString = substr($requestUrl, strlen(URLROOT));
$urlParams = explode('/', $requestString);
array_shift($urlParams);
$controllerName = strtolower(array_shift($urlParams));
$actionName = strtolower(array_shift($urlParams));
if ($actionName == "") {
    $actionName = "index";
}

// switch between controllers
switch ($controllerName) {
    case "":
        $model = new Model($database);
        $view = new View();
        $controller = new IndexController($model, $view);
        $controller->$actionName();
        break;
    case "about":
        $view = new AboutView();
        $controller = new AboutController($view);
        $controller->$actionName();
        break;
    case "login":
        $model = new LoginModel($database);
        $view = new LoginView();
        $controller = new LoginController($model, $view);
        $controller->$actionName();
        break;
    case "signup":
        $model = new SignUpModel($database);
        $view = new SignUpView();
        $controller = new SignUpController($model, $view);
        $controller->$actionName();
        break;
    case "admin":
        $model = new AdminModel($database);
        $view = new AdminView();
        $controller = new AdminController($model, $view);
        $controller->$actionName();
        break;
}
