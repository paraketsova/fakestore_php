<?php

class SignUpController
{
    private $model;
    private $view;

    public function __construct($model, $view)
    {
        $this->model = $model;
        $this->view = $view;
    }

    public function signUp(){
    $this->view->viewHeader("");
    $this->view->viewSignUpPage();

    if($_SERVER['REQUEST_METHOD'] === 'POST'){
      $this->validateSignUp();
    }
    $this->view->viewFooter();
  }


  public function validateSignUp(){
    $name = $this->sanitize($_POST['name']);  
    $email = $this->sanitize($_POST['email']);
    $pass = $this->sanitize($_POST['password']);
    $password = md5($pass);

    $checking = $this->model->signupUser($name, $email, $password);

    if($checking){
      $this->view->viewConfirmSignUpMessage($email);
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