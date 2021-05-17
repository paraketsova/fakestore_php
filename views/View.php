<?php

class View
{
    public function viewHeader($title)
    {
        include_once("views/include/header.php");
    }

    public function viewFooter()
    {
        include_once("views/include/footer.php");
    }

    public function viewAboutPage()
    {
        include_once("views/include/about.php");
    }

    public function viewAllProducts($products)
    {
        foreach ($products as $product) {
            $this->viewOneProduct($product);
            //echo "<pre>"; print_r($products);
        }
    }

    public function viewOneProduct($product)
    {
        $html = <<<HTML
            <div class="col-lg-4 col-md-6 mb-4">
                <a href="?page=product&id=$product[product_id]">
                    <div class="card h-100">
                        <img class="card-img-top" src="images/$product[image]" alt="$product[title]" />
                        <div class="card-body">
                            <h4 class="card-title">$product[title]</h4>
                            <h5>$product[price] kr</h5>
                            <p class="card-text">$product[description]</p>
                        </div>
                        <div class="card-footer"><small class="text-muted">★ ★ ★ ★ ☆</small></div>
                    </div>
                </a>
            </div>

        HTML;

        echo $html;
    }

    public function viewDetailPage($product) {
        $this->viewOneProduct($product);
    }
}
