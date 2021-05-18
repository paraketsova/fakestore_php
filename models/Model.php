<?php

class Model
{

 private $db;

 public function __construct($database)
 {
  $this->db = $database;
 }

 public function fetchAllProducts()
 {
  $products = $this->db->select("SELECT * FROM products");
  return $products;
 }

 public function fetchOneProductById($id)
  {
    $statement = "SELECT * FROM products WHERE product_id = :id";
    $params = array(":id" => $id);
    $product = $this->db->select($statement, $params);
    //print_r($product);
    return $product[0] ?? false;
  }

  
  public function fetchCustomerForLogin($email, $password)
  {
      $statement = "SELECT * FROM customers WHERE email=:email";
      $parameters = array(':email' => $email);
      $customer = $this->db->select($statement, $parameters);
      return $customer[0] ?? false;
  }

  public function loginUser($email, $password)
  {
    if (isset($_POST)) {
      $user = $_POST['admin'] ?? ['customers'];
      $email = $_POST['email'];
      $password = $_POST['password'];

      if ($email != "" && $password != "") {
        $statement = "SELECT * FROM $user WHERE email=:email AND password=:password";
        $parameters = array(
          ':email' => $email,
          ':password' => $password
        );
        $loggedUser = $this->db->select($statement, $parameters);
         if(count($loggedUser) > 0 ){
          $_SESSION['email'] = $email;
          return array('loggedUser' => $loggedUser) ?? false;
        }
      }
    }
  }


  /* public function saveOrder($customer_id, $product_id, $quantity)
  {
    $customer = $this->fetchCustomerById($customer_id);
    if (!$customer) return false;

    $statement = "INSERT INTO orders (customer_id, product_id, quantity)
                  VALUES (:customer_id, :product_id, :quantity)";
    $parameters = array(
      ':customer_id' => $customer_id,
      ':product_id' => $product_id,
      ':quantity' => $quantity
    );

    // Ordernummer
    $lastInsertId = $this->db->insert($statement, $parameters);

    return array('customer' => $customer, 'lastInsertId' => $lastInsertId);
  } */
}
