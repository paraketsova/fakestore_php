<?php

class SignUpModel
{
    private $db;

    public function __construct($database)
    {
        $this->db = $database;
    }

    public function signupUser($name, $email, $password)
    {
        if (isset($_POST)) {
            $statement =  "INSERT INTO customers (name, email, password) 
                           VALUES (:name, :email, :password)";
            $parameters = array(
                ':name' => $name,
                ':email' => $email,
                ':password' => $password
            );
            $newCustomer = $this->db->insert($statement, $parameters);
            return array('newCustomer' => $newCustomer) ?? false;               
        }
    }
}    