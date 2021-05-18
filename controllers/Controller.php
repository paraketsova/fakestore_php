<?php

class Controller
{

  private $model;
  private $view;

  public function __construct($model, $view)
  {
    $this->model = $model;
    $this->view = $view;
  }

  public function main()
  {
    $this->router();
  }

  private function router()
  {
    //if $page = $_POST['page'];
    $page = $_GET['page'] ?? "";

    switch ($page) {
      case "about":
        $this->about();
        break;
      case "product":
        $this->getOneProduct();
        break;
      case "login":
        $this->login();
        break;
/*       case "cart":
        $this->getProductToCart();
        break; */
      default:
        $this->getAllProducts();
    }
  }

  private function about()
  {
    $this->getHeader("Om Oss");
    $this->view->viewAboutPage();
    $this->getFooter();
  }

  private function getHeader($title)
  {
    $this->view->viewHeader($title);
  }

  private function getFooter()
  {
    $this->view->viewFooter();
  }

  private function getAllProducts()
  {
    $this->getHeader("");
    $products = $this->model->fetchAllProducts();
    $this->view->viewAllProducts($products);
    $this->getFooter();
  }

  private function getOneProduct()
  {
    $this->getHeader("");

    $id = $this->sanitize($_GET['id']);
    $product = $this->model->fetchOneProductById($id);
    if($product)
      $this->view->viewDetailPage($product);
/*
    if ($_SERVER['REQUEST_METHOD'] === 'POST')
      $this->getProductToCart();
 */
    $this->getFooter();
  }


  private function login(){
    $this->getHeader("");
    $this->view->viewLoginPage();

    if($_SERVER['REQUEST_METHOD'] === 'POST'){
      $this->validateLogin();
    }
    $this->getFooter();
  }
   
 
  public function validateLogin(){
    $email = $this->sanitize($_POST['email']);
    $password = $this->sanitize($_POST['password']);
    
    $checking = $this->model->loginUser($email, $password);

    if($checking){
      $this->view->viewConfirmLoginMessage($email);
      //to do send to index page
    } else {
      $this->view->viewErrorMessage($email);
    }
  }

  private function getProductToCart() {

  }


  /**
   * Sanitize Inputs
   */
  public function sanitize($text)
  {
    $text = trim($text);
    $text = stripslashes($text);
    $text = htmlspecialchars($text);
    return $text;
  }
}
