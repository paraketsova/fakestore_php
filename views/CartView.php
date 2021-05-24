<?php
class CartView
{
  public function viewHeader($title)
  {
    include_once("views/include/header.php");
  }

  public function viewFooter()
  {
    include_once("views/include/footer-sm.php");
  }



  public function viewCartPage($products)
  {
    $html = <<<HTML
     <div class="cart content-wrapper">
      <h1>Shopping Cart</h1>
      <form action="cart" method="post">
        <table>
          <thead>
            <tr>
            <td></td>
            <td>Product</td>
            <td>Quantity</td>
            <td>Price</td>
            <td>Total</td>
            </tr>
            </thead>
            <tbody>

  HTML;
  echo $html;

    foreach ($products as $product) {
      $this->renderItemCart($product);
      //echo "<pre>"; print_r($products); // test
    }
    $html = <<<HTML
            </tbody>
          </table> 
        </form>
      </div>    
  HTML;
    echo $html;
  }

  public function renderItemCart($product)
  {
    $sum = $product['quantity'] * $product['price'];

    $html = <<<HTML

      <tr>
        <td>
          <img src="images/$product[image]" width="50" height="50" alt=$product[image]>
        </td>
        <td>$product[title]</td>
        <td>$product[quantity]</td>
        <td>$product[price] kr</td>
        <td>$sum kr</td>
        
      </tr>

   HTML;
    echo $html;
  }
}
