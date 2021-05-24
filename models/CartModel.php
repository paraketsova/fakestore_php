<?php

class CartModel
{

 private $db;

 public function __construct($database)
 {
  $this->db = $database;
 }

 public function fetchOneCustomerByEmail() {
  $email_customers = $_SESSION['email'];
  $statement = "SELECT customer_id FROM customers WHERE email = :email";
  $parameters = array (
    ':email' => $email_customers
  );
  $customers = $this->db->select($statement, $parameters);
  $customer_id = $customers[0][0];
  return $customer_id;
 }

  public function addOrder($customer_id, $totalSum)
  {
    $statement = "INSERT INTO orders (customer_id, order_sum) VALUES (:customer_id, :order_sum)";
    $parameters = array(
      ':customer_id' => $customer_id,
      ':order_sum' => $totalSum
    );
    $this->db->insert($statement, $parameters);
  }
}