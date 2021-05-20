<?php

define('URLROOT', 'http://localhost:8888/fakestore_php');

// Models
require_once("models/Database.php");
require_once("models/Model.php");
require_once("models/LoginModel.php");
require_once("models/SignUpModel.php");

// Viwes
require_once("views/View.php");
require_once("views/LoginView.php");
require_once("views/SignUpView.php");

// Controllers
require_once("controllers/Controller.php");
require_once("controllers/LoginController.php");
require_once("controllers/SignUpController.php");


$database   = new Database("webshopdb", "root", "root");

$model      = new Model($database);
$view       = new View();
$controller = new Controller($model, $view);

$loginModel = new LoginModel($database);
$loginView  = new LoginView();
$loginController = new LoginController($loginModel, $loginView);

$signUpModel = new SignUpModel($database);
$signUpView = new SignUpView();
$signUpController = new SignUpController($signUpModel, $signUpView);

// Simple Router
$url = getUrl();
$page = $url[0] ?? "";
$param = $url[1] ?? "";

switch ($page) {
    case "":
        $controller->index();
        break;
    case "about":
        $controller->about();
        break;
    case "login":
        $loginController->login();
        break;
    case "signup":
        $signUpController->signUp();
        break;    
}

function getUrl()
{
    if (isset($_GET['url'])) {
        $url = rtrim($_GET['url'], '/');
        $url = filter_var($url, FILTER_SANITIZE_URL);
        $url = explode('/', $url);
        //print_r($url); - test
        return $url;
    }
}