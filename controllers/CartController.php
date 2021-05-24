<?php
class CartController
{
  public function __construct()
  {
  }

  // GET /cart
  public function index() {
    if (!isset($_SESSION['cart'])) {
        // empty, render empty
    } else {
        // render $_SESSION['cart'])
    }
  }

  public function add() {
    if (!isset($_SESSION['cart'])) {
      $_SESSION['cart'] = array();
    }
    $product = array();
    $product['product_id'] = $this->sanitize($_POST['product_id']);
    $product['title'] = $this->sanitize($_POST['title']);
    $product['quantity'] = $this->sanitize($_POST['quantity']);
    $product['price'] = $this->sanitize($_POST['price']);
    array_push($_SESSION['cart'], $product);
    header("Location: " . URLROOT);
  }

  // POST /cart/checkout
  public function checkout() {
    if (!isset($_SESSION['cart'])) {
        // error
        header("Location: " . URLROOT);
    } else {
        // store in database
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