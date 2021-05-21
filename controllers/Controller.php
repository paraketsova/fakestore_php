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

  public function index()
  {
    $this->view->viewHeader("");
    $products = $this->model->fetchAllProducts();
    $this->view->viewAllProducts($products);
    $this->view->viewFooter();
  }

  public function about()
  {
    $this->view->viewHeader("Om Oss");
    $this->view->viewAboutPage();
    $this->view->viewFooter();
  }


//   private function getOneProduct()
//   {
//     $this->view->viewHeader("");

//     $id = $this->sanitize($_GET['id']);
//     $product = $this->model->fetchOneProductById($id);
//     if($product)
//       $this->view->viewDetailPage($product);
// /*
//     if ($_SERVER['REQUEST_METHOD'] === 'POST')
//       $this->getProductToCart();
//  */
//     $this->viewFooter();
//   }


  // private function getProductToCart() {

  // }

}
