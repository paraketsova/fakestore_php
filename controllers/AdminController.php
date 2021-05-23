<?php
class AdminController
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
    $this->view->viewAdminIndex();
    $this->view->viewFooter();
  }

  public function unauthorized()
  {
    $this->view->viewHeader("");
    $this->view->viewUnathorizedMessage();
    // $this->view->viewFooter();
  }

  public function products()
  {
    $this->view->viewHeader("");
    $products = $this->model->fetchAllProducts();
    $this->view->viewAdminProducts($products);
    $this->view->viewFooter();
  }

  public function delete()
  {
    $id = $this->sanitize($_POST['id']);
    $this->model->deleteOneProduct($id);
    header('Location: products');
  }

  public function edit()
  {
    $id = $this->sanitize($_GET['id']);
    $product = $this->model->fetchOneProductById($id);
    $this->view->viewHeader("");
    $this->view->editProduct($product);
    $this->view->viewFooter();
  }

  public function update()
  {
    $product = array();
    $product['id'] = $this->sanitize($_POST['id']);
    $product['title'] = $this->sanitize($_POST['title']);
    $product['description'] = $this->sanitize($_POST['description']);
    $product['image'] = $this->sanitize($_POST['image']);
    $product['price'] = $this->sanitize($_POST['price']);
    $this->model->updateProduct($product);
    header('Location: products');
  }

  // Render form for new product
  public function new()
  {
    $this->view->viewHeader("");
    $this->view->newProduct();
    $this->view->viewFooter();
  }
  // Create new product in db
  public function create()
  {
    $product = array();
    $product['title'] = $this->sanitize($_POST['title']);
    $product['description'] = $this->sanitize($_POST['description']);
    $product['image'] = $this->sanitize($_POST['image']);
    $product['price'] = $this->sanitize($_POST['price']);
    $this->model->createProduct($product);
    header('Location: products');
  }

  /**
   * Orders
   */
  public function orders()
  {
    $this->view->viewHeader("");
    $orders = $this->model->fetchAllOrders();
    $this->view->viewAdminOrders($orders);
    //$this->view->viewFooter();
  }

  public function edit_order()
  {
    $id = $this->sanitize($_GET['id']);
    $order = $this->model->fetchOneOrderById($id);
    $this->view->viewHeader("");
    $this->view->editOrder($order);
    $this->view->viewFooter();
  }

  public function update_order()
  {
    $order = array();
    $order['id'] = $this->sanitize($_POST['id']);
    $order['order_status'] = $this->sanitize($_POST['order_status']);
    $this->model->updateOrder($order);
    header('Location: orders');
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