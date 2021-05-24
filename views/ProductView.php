<?php
class ProductView
{
  public function viewHeader()
  {
    include_once("views/include/header.php");
  }

  public function viewFooter()
  {
    include_once("views/include/footer.php");
  }


  public function viewDetailPage($product)
  {
    $this->viewDetailProduct($product);
  }

  public function viewDetailProduct($product)
  {
    $action = URLROOT . "/cart/add";
    $html = <<<HTML

    <div class="col-lg-7">
        <div class="card mt-4">
            <img class="card-img-top img-fluid" src="images/$product[image]" alt="$product[title]" />
            <div class="card-body ">
                <h3 class="card-title">$product[title]</h3>
                <h4>$product[price] kr</h4>
                <p class="card-text">$product[description]</p>
                <form action="$action" method="post">
                    <input type="hidden" name="product_id" value="$product[product_id]">
                    <input type="hidden" name="title" value="$product[title]">
                    <input type="hidden" name="image" value="$product[image]">
                    <input type="hidden" name="price" value="$product[price]">
                    <input type="number" name="quantity" value="1" min="1" max="10" placeholder="Quantity" required>
                    <button type="submit" name="Submit" class="btn btn-secondary mt-1 mb-2 ml-4"><i class="fas fa-shopping-cart"></i> Lägg i varukorgen</button>
                </form>
            </div>
        </div>
    </div>

    HTML;

    echo $html;
  }
}


