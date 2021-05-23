<?php

class ProductModel
{
 private $db;

 public function __construct($database)
 {
  $this->db = $database;
 }

 public function fetchOneProductById($id)
 {
   $statement = "SELECT * FROM products WHERE product_id = :id";
   $params = array(':id' => $id);
   $product = $this->db->select($statement, $params);
   return $product[0];
 }
}