<?php
class ProductController
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
    $id = $this->sanitize($_GET['id']);
    $product = $this->model->fetchOneProductById($id);
    $this->view->viewDetailPage($product);
    $this->view->viewFooter();
  }

  public function add($id, $quantity, $price) {
    if (!isset($_SESSION['cart'])) {
      $_SESSION['cart'] = array();
    }
    $product = array();
    $product['id'] = $id;
    $product['quantity'] = $quantity;
    $product['price'] = $price;
    array_push($_SESSION['cart'], $product);
  }
   /**
   * Sanitize
   */
  public function sanitize($text)
  {
    $text = trim($text);
    $text = stripslashes($text);
    $text = htmlspecialchars($text);
    return $text;
  }
}