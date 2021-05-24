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

  public function addOrder($customer_id, $products, $totalSum)
  {
    $statement = "INSERT INTO orders (customer_id, products, order_sum) VALUES (:customer_id, :products, :order_sum)";
    $parameters = array(
      ':customer_id' => $customer_id,
      ':products' => json_encode($products),
      ':order_sum' => $totalSum
    );
    $this->db->insert($statement, $parameters);
  }
}