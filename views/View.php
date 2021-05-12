<?php

class View
{
 public function viewAboutPage()
 {
  include_once("views/include/about.php");
 }

 public function viewAllProducts($products)
 {
  foreach ($products as $product) {
  //$this->viewOneProduct($product);
  echo "<pre>"; print_r($products);
 }
 }
}
