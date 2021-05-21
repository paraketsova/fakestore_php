<?php

class AdminModel
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

//  public function fetchOneProductById($id)
//   {
//     $statement = "SELECT * FROM products WHERE product_id = :id";
//     $params = array(":id" => $id);
//     $product = $this->db->select($statement, $params);
//     return $product[0] ?? false;
//   }

}