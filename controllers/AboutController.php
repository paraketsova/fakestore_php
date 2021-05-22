<?php

class AboutController
{

  private $view;

  public function __construct($view)
  {
    $this->view = $view;
  }

  public function index()
  {
    $this->view->viewHeader("Om Oss");
    $this->view->viewAboutPage();
    $this->view->viewFooter();
  }
}
