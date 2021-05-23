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

  public function index()
  {
    $this->view->viewHeader("");
    $this->view->viewLoginPage();

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $this->login();
    }
    $this->view->viewFooter();
  }


  public function login()
  {
    $email = $this->sanitize($_POST['email']);
    $pass = $this->sanitize($_POST['password']);
    $password = md5($pass);

    $checking = $this->model->loginUser($email, $password);

    if ($checking) {
      // $_SESSION["login"] = $email;
      $this->view->viewConfirmLoginMessage($email);
      if ($email == 'admin@admin.se') {
        header("Location: " . URLROOT . "/admin");
      } else {
        header("Location: " . URLROOT);
      }
    } else {
      $this->view->viewErrorMessage();
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
