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
    $this->view->viewAdminPage($products);
    $this->view->viewFooter();
  }

}