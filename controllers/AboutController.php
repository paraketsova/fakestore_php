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
    $this->view->viewHeader("");
    $this->view->viewAboutPage();
    $this->view->viewFooter();
  }
}
