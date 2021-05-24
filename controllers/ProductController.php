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