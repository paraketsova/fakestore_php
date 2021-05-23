<?php

class LogoutController
{
  public function __construct()
  {
  }

  public function index()
  {
    // remove all session variables
    session_unset();
    // destroy the session
    session_destroy();
    header("Location: " . URLROOT);
  }
}
