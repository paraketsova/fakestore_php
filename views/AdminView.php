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
      $url = URLROOT;

      $html = <<<HTML
      <div class="col-lg-12">
        <div class="row justify-content-center">
         <table class=table> 
            <tr>
                <th>Title</th>
                <th>Description</th>
                <th>Image</th>
                <th>Price</th>
                <th></th>
                <th></th>
            </tr>

      HTML;

      echo $html;

      foreach ($products as $product) {
        $this->viewOneItem($product);
      //echo "<pre>"; print_r($products); // test
      }
      
      $html = <<<HTML

          </table>
        </div>
      </div>

      HTML;
      echo $html;
      
  }

  public function viewOneItem($product)
  {
    $url = URLROOT;

    $html = <<<HTML

            <tr>
                 <td>$product[title]</td>
                 <td>$product[description]</td>
                 <td>$product[image]</td>
                 <td>$product[price]</td>
                 <td>
                 <a href="#" class='btn btn-sm btn-outline-danger' >  
                 Delete
                 </td>
                 <td>
                 <!-- Update product-->
                 <a href="#" class='btn btn-sm btn-outline-success'>
                 Edit
              </td>
            </tr>

    HTML;

    echo $html;
  }


}