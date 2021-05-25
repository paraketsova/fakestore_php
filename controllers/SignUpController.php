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

  public function index()
  {
    $this->view->viewHeader("");
    $this->view->viewSignUpPage();

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $this->validateSignUp();
    }
    $this->view->viewFooter();
  }


  public function validateSignUp()
  {
    $name = $this->sanitize($_POST['name']);
    $email = $this->sanitize($_POST['email']);
    $pass = $this->sanitize($_POST['password']);
    $pass2 = $this->sanitize($_POST['password2']);

    if ($pass !== $pass2) {
      $this->view->viewErrorPasswordMessage();
      return;
    }

    $password = md5($pass);

    $checking = $this->model->signupUser($name, $email, $password);

    if (!$checking) {
      $this->view->viewErrorMessage($email);
      return;
    }

    $this->view->viewConfirmSignUpMessage($email);
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
