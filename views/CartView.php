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
    <h4>DIN VARUKORG</h4>
    <div class="col-lg-12">
      <div class="row justify-content-center">
        <form action="cart" method="post">
          <table class="table">
            <tr>
              <th></th>
              <th>Product</th>
              <th>Quantity</th>
              <th>Price</th>
              <th>Total</th>
            </tr>
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
            <div>
              <span class="text">ATT BETALA</span>
              <span class=""> kr</span>
            </div>
            <div class="buttons">
                <input type="submit" value="Update" name="update">
                <input type="submit" value="Place Order" name="placeorder">
            </div>
          </form>
        </div>
      </div>
  HTML;
    echo $html;
  }

  public function renderItemCart($product)
  {
    $sum = $product['quantity'] * $product['price'];
    // array_push($totalSumArray, $sum);

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
