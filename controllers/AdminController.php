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

  public function product_edit() {
    $this->view->viewHeader("");
    $products = $this->model->fetchAllProducts();
    //$id = $this->sanitize($_GET['id']); // skapa id när man klickar på en film
    //$product = $this->model->fetchProductById($id);

    $this->view->viewAdminProducts($products);
    $this->view->viewFooter();
  }

}