<?php

class IndexController
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
}
