<?php
class CartView
{
  public function viewHeader()
  {
    include_once("views/include/header.php");
  }

  public function viewFooter()
  {
    include_once("views/include/footer-sm.php");
  }



  public function viewCartPage($products)
  {
    $action_cart = URLROOT . "/cart/checkout";
    $totalSum = 0;
    $html = <<<HTML
   <div class="col-lg-12 ">
   <h4 class="text-center mt-5 mb-5">DIN VARUKORG</h4>
      <div >
        <form action="$action_cart" method="post">
          <table class="table">
            <tr>
              <th></th>
              <th>Product</th>
              <th>Quantity</th>
              <th>Price</th>
              <th>Total</th>
            </tr>

  HTML;
  echo $html;

    foreach ($products as $product)
    {
      $sum = $product['quantity'] * $product['price'];
      $totalSum += $sum;
      $this->renderItemCart($product, $sum);
    }

    $html = <<<HTML

            </table>
            <div class="card-footer d-flex align-items-end flex-column">
              <span class="text p-2">ATT BETALA $totalSum kr </span>
            </div>
            <div class="text-center mt-3">
             <button type="submit" name="Submit" class="btn btn-secondary mb-5 ">Bekräfta order</button>
            <div>
          </form>
        </div>
      </div>
  HTML;
    echo $html;
  }

  public function renderItemCart($product, $sum)
  {
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

  public function viewCheckoutPage()
  {
    echo '<h4 class="text-center mt-5">Din order är mottagen!</h4>';
  }
}
