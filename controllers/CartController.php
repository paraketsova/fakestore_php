<?php
class CartController
{
  private $model;
  private $view;

  public function __construct($model, $view)
  {
    $this->model = $model;
    $this->view = $view;
  }

  // GET /cart
  public function index() {
    if (!isset($_SESSION['cart'])) {
      // empty, render empty
        $this->view->viewHeader("");
        $this->view->viewFooter();
    } else {
      // render $_SESSION['cart'])
      $this->view->viewHeader("");
      $products = $_SESSION['cart'];
      $isLoggedIn = !!@$_SESSION['email'];
      $this->view->viewCartPage($products, $isLoggedIn);
      $this->view->viewFooter();
    }
  }

  public function add() {
    if (!isset($_SESSION['cart'])) {
      $_SESSION['cart'] = array();
    }
    $product = array();
    $product['product_id'] = $this->sanitize($_POST['product_id']);
    $product['image'] = $this->sanitize($_POST['image']);
    $product['title'] = $this->sanitize($_POST['title']);
    $quantity = $this->sanitize($_POST['quantity']);
    $product['quantity'] = $quantity;
    $product['price'] = $this->sanitize($_POST['price']);
    array_push($_SESSION['cart'], $product);
    if (!isset($_SESSION['n_products_in_cart'])) {
        $_SESSION['n_products_in_cart'] = $quantity;
    } else {
        $_SESSION['n_products_in_cart'] += $quantity;
    }
    header("Location: " . URLROOT);
  }

  // POST /cart/checkout
  public function checkout() {
    if (!isset($_SESSION['cart'])) {
      // error
      header("Location: " . URLROOT);
    } else {
      // store cart in database

      $customer_id = $this->model->fetchOneCustomerByEmail();

      $products = $_SESSION['cart'];
      $totalSum = 0;
      foreach ($products as $product)
      {
        $sum = $product['quantity'] * $product['price'];
        $totalSum += $sum;
      }

      $this->model->addOrder($customer_id, $products, $totalSum);

      // clear cart in the session
      unset($_SESSION['cart']);
      unset($_SESSION['n_products_in_cart']);

      $this->view->viewHeader("");
      $this->view->viewCheckoutPage();
      $this->view->viewFooter();
    }
  }

  public function sanitize($text)
  {
    $text = trim($text);
    $text = stripslashes($text);
    $text = htmlspecialchars($text);
    return $text;
  }
}