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

  public function admin()
  {
    $this->view->viewHeader("Hej Admin!");
    $products = $this->model->fetchAllProducts();
    //$id = $this->sanitize($_GET['id']); // skapa id när man klickar på en film
    //$product = $this->model->fetchProductById($id);

    $this->view->viewAdminPage($products);
    $this->view->viewFooter();
  }
  
}