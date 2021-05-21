<?php

class AdminView
{
  public function viewHeader($title)
  {
      include_once("views/include/header.php");
  }

  public function viewFooter()
  {
      include_once("views/include/footer.php");
  }


  public function viewAdminPage($products)
  {
    $this->viewProductsTable($products);
  }

  public function viewProductsTable($products)
  {
      foreach ($products as $product) {
        //$this->viewOneItem($product);
        echo "<pre>"; print_r($products); // test
      }
  }

  public function viewOneItem($product)
  {
    $url = URLROOT;

    $html = <<<HTML

      <div class="col-lg-9">
        <div class="row justify-content-center">

        </div>
      </div>

    HTML;

    echo $html;
  }


}