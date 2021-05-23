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

  public function viewAdminIndex()
  {
    include_once("views/include/admin.php");
  }

  public function viewUnathorizedMessage()
  {
      $this->printMessage(
          "<h4>Administrators only area</h4>
          <h5>Controlera dina uppgifter!</h5>",
          "warning"
      );
  }

  public function printMessage($message, $messageType = "danger")
  {
      $html = <<< HTML

          <div class="my-2 alert alert-$messageType">
              $message
          </div>

      HTML;

      echo $html;
  }

  public function viewAdminProducts($products)
  {
    $this->viewProductsTable($products);
  }

  public function viewProductsTable($products)
  {
      $url = URLROOT;

    $html = <<<HTML
      <div class="col-lg-12">
        <div class="row justify-content-center">
        <!-- button for create new product -->
          <a href="new" class='btn btn-secondary btn-lg mb-5'>Create new product</a>
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
        $this->renderProductLine($product);
      //echo "<pre>"; print_r($products); // test
      }

      $html = <<<HTML

          </table>
        </div>
      </div>

      HTML;
      echo $html;

  }

  public function renderProductLine($product)
  {
    $html = <<<HTML

      <tr>
        <td>$product[title]</td>
        <td>$product[description]</td>
        <td>$product[image]</td>
        <td>$product[price]</td>
        <td>
          <!-- Update product-->
          <a href="edit?id=$product[product_id]" class='btn btn-sm btn-outline-success'>
          Edit
          </td>
        <td>
          <form method='post' action="delete">
          <!-- Delete product-->
            <input type="hidden" name="id" value="$product[product_id]" />
            <button class='btn btn-sm btn-outline-danger' >
            Delete</button>
          </form>
        </td>
      </tr>

    HTML;

    echo $html;
  }

  public function editProduct($product)
  {
    $html = <<<HTML
    <div class="row col-lg-12 text-center">
      <h2>Edit product</h2>
    </div>
    <form action="update" method="post" class="row">
      <input type="hidden" name="id" value="$product[product_id]" />
      <div class="col-lg-12">
        <label for="title">Title</label>
        <input id="title" type="text" name="title" class="form-control mt-2 text-center" value="$product[title]" required>
      </div>
      <div class=" col-lg-12">
        <label for="description">Description</label>
        <textarea class="form-control mt-2 text-center" id="description" name="description" required >$product[description]</textarea>
      </div>
      <div class="col-lg-12">
        <label for="image">Image</label>
        <input id="image" type="text" name="image" class="form-control mt-2 text-center" value="$product[image]" required>
      </div>
      <div class="col-lg-12">
        <label for="price">Price</label>
        <input id="price" type="number" name="price" class="form-control mt-2 text-center" value="$product[price]" required>
      </div>
      <div class='col-lg-12 mx-auto'>
        <input type='submit' class='form-control mt-2 btn btn-outline-primary' value='Update'>
      </div>
    </form>
    HTML;
    echo $html;
  }

  /***
   * Function to create new product
   */
  public function newProduct()
  {
    $html = <<<HTML
    <div class="row col-lg-12 text-center">
        <h2>New product</h2>
    </div>
    <form action="create" method="post" class="row">
      <input type="hidden" name="id" />
        <div class="col-lg-12">
            <label for="title">Title</label>
            <input id="title" type="text" name="title" class="form-control mt-2 text-center" required>
        </div>
        <div class=" col-lg-12">
            <label for="description">Description</label>
            <textarea class="form-control mt-2 text-center" id="description" name="description" required ></textarea>
        </div>
        <div class="col-lg-12">
            <label for="image">Image</label>
            <input id="image" type="text" name="image" class="form-control mt-2 text-center" required>
        </div>
        <div class="col-lg-12">
            <label for="price">Price</label>
            <input id="price" type="number" name="price" class="form-control mt-2 text-center" required>
        </div>
        <div class='col-lg-12 mx-auto'>
            <input type='submit' class='form-control mt-2 btn btn-outline-primary' value='Create'>
        </div>
    </form>
    HTML;
    echo $html;
  }

}