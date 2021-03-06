<?php

class AdminView
{
  public function viewHeader()
  {
      include_once("views/include/header.php");
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

  public function viewAdminOrders($orders)
  {
    $this->viewOrdersTable($orders);
  }

  /***
  * Products
  */

  public function viewProductsTable($products)
  {
    $html = <<<HTML
      <div class="col-lg-12">
        <div class="row justify-content-center">
        <!-- button for create new product -->
          <a href="new" class='btn btn-secondary btn-lg mb-5 text-decoration-none'>Create new product</a>
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
          <a href="edit?id=$product[product_id]" class='btn btn-sm btn-outline-success text-decoration-none'>
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
        <label for="title" class="mb-0 mt-4">Title</label>
        <input id="title" type="text" name="title" class="form-control mt-2 text-center" value="$product[title]" required>
      </div>
      <div class=" col-lg-12">
        <label for="description" class="mb-0 mt-4">Description</label>
        <textarea class="form-control mt-2 text-center" id="description" name="description" required >$product[description]</textarea>
      </div>
      <div class="col-lg-12">
        <label for="image" class="mb-0 mt-4">Image</label>
        <input id="image" type="text" name="image" class="form-control mt-2 text-center" value="$product[image]" required>
      </div>
      <div class="col-lg-12">
        <label for="price" class="mb-0 mt-4">Price</label>
        <input id="price" type="number" name="price" class="form-control mt-2 text-center" value="$product[price]" required>
      </div>
      <div class='col-lg-12 mx-auto'>
        <input type='submit' class='form-control mt-2 btn btn-outline-primary mt-4' value='Update'>
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
            <label for="title" class="mb-0 mt-4">Title</label>
            <input id="title" type="text" name="title" class="form-control mt-2 text-center" required>
        </div>
        <div class=" col-lg-12">
            <label for="description" class="mb-0 mt-4">Description</label>
            <textarea class="form-control mt-2 text-center" id="description" name="description" required ></textarea>
        </div>
        <div class="col-lg-12">
            <label for="image" class="mb-0 mt-4">Image</label>
            <input id="image" type="text" name="image" class="form-control mt-2 text-center" required>
        </div>
        <div class="col-lg-12">
            <label for="price" class="mb-0 mt-4">Price</label>
            <input id="price" type="number" name="price" class="form-control mt-2 text-center" required>
        </div>
        <div class='col-lg-12 mx-auto mt-4'>
            <input type='submit' class='form-control mt-2 btn btn-outline-primary' value='Create'>
        </div>
    </form>
    HTML;
    echo $html;
  }

/***
* Orders
*/

public function viewOrdersTable($orders)
  {
    $html = <<<HTML
      <div class="col-lg-12">
        <div class="row justify-content-center">
          <h4>Orders</h4>
          <table class="table mt-3">
            <tr>
                <th>Order number</th>
                <th>Customer</th>
                <th>Order date</th>
                <th>Status</th>
                <th></th>
            </tr>

      HTML;

      echo $html;

      foreach ($orders as $order) {
        $this->renderOrderLine($order);
      }

      $html = <<<HTML

          </table>
        </div>
      </div>

      HTML;
      echo $html;
  }

  public function renderOrderLine($order)
  {
    $html = <<<HTML

      <tr>
        <td>$order[order_id]</td>
        <td>$order[customer_id]</td>
        <td>$order[order_date]</td>
        <td>$order[order_status]</td>

        <td>
          <!-- Update order's status-->
          <a href="edit_order?id=$order[order_id]" class='btn btn-sm btn-outline-success'>
          Edit
        </td>
      </tr>

    HTML;

    echo $html;
  }

  public function editOrder($order)
  {
    $html = <<<HTML
    <div class="row col-lg-12 text-center">
      <h2>Edit order</h2>
    </div>
    <form action="update_order" method="post" class="row">
      <input type="hidden" name="id" value="$order[order_id]" />
      <div class="col-lg-12">
        <label for="id" class="mb-0 mt-4">Order number</label>
        <input id="id" type="text" name="id" class="form-control mt-2 text-center" value="$order[order_id]" readonly>
      </div>
      <div class=" col-lg-12">
        <label for="customer" class="mb-0 mt-4">Customer</label>
        <input id="customer" type="text" name="customer"  class="form-control mt-2 text-center" value="$order[customer_id]" readonly>
      </div>
      <div class="col-lg-12">
        <label for="order_date" class="mb-0 mt-4">Order date</label>
        <input id="order_date" type="text" name="order_date" class="form-control mt-2 text-center" value="$order[order_date]"  readonly>
      </div>
      <div class="col-lg-12">
        <label for="order_status" class="mb-0 mt-4">Order status</label>
        <input id="order_status" type="text" name="order_status" class="form-control mt-2 text-center" value="$order[order_status]" required>
      </div>
      <div class='col-lg-12 mx-auto mt-4'>
        <input type='submit' class='form-control mt-2 btn btn-outline-primary' value='Update'>
      </div>

    </form>
    HTML;
    echo $html;
  }
}