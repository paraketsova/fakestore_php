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

  public function sanitize($text)
  {
    $text = trim($text);
    $text = stripslashes($text);
    $text = htmlspecialchars($text);
    return $text;
  }
}