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

 public function fetchOneProductById($id)
  {
    $statement = "SELECT * FROM products WHERE product_id = :id";
    $params = array(':id' => $id);
    $products = $this->db->select($statement, $params);
    return $products[0];
  }
 public function deleteOneProduct($id)
 {
    $statement = "DELETE FROM products WHERE product_id = :id";
    $parameters = array(':id' => $id);
    $this->db->delete($statement, $parameters);
 }
 public function updateProduct($product)
 {
    $statement = "UPDATE products SET title = :title, description = :description, image = :image, price = :price WHERE product_id = :id";
    $parameters = array(
      ':title' => $product['title'],
      ':description' => $product['description'],
      ':image' => $product['image'],
      ':price' => $product['price'],
      ':id' => $product['id']
    );
    $this->db->update($statement, $parameters);
 }

}