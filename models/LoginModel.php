<?php

class LoginModel
{
    private $db;

    public function __construct($database)
    {
        $this->db = $database;
    }

    public function loginUser($email, $password)
    {
        if (isset($_POST)) {
            if ($email == "admin@admin.se") {
                $user = "admin";
            } else {
                $user = "customers";
            }

            if ($email != "" && $password != "") {
                $statement = "SELECT * FROM $user WHERE email=:email AND password=:password";
                $parameters = array(
                    ':email' => $email,
                    ':password' => $password
                );
                $loggedUser = $this->db->select($statement, $parameters);
                if (count($loggedUser) > 0) {
                    $_SESSION['email'] = $email;
                    return array('loggedUser' => $loggedUser) ?? false;
                }
            }
        }
    }
}