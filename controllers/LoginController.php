<?php

class LoginController
{
    private $model;
    private $view;

    public function __construct($model, $view)
    {
        $this->model = $model;
        $this->view = $view;
    }

    public function login(){
    $this->view->viewHeader("");
    $this->view->viewLoginPage();

    if($_SERVER['REQUEST_METHOD'] === 'POST'){
      $this->validateLogin();
    }
    $this->view->viewFooter();
  }


  public function validateLogin(){
    $email = $this->sanitize($_POST['email']);
    $pass = $this->sanitize($_POST['password']);
    $password = md5($pass);

    $checking = $this->model->loginUser($email, $password);

    if($checking){
      $this->view->viewConfirmLoginMessage($email);
    } else {
      $this->view->viewErrorMessage($email);
    }
  }

    /**
   * Sanitize Inputs
   */
  public function sanitize($text)
  {
    $text = trim($text);
    $text = stripslashes($text);
    $text = htmlspecialchars($text);
    return $text;
  }

}