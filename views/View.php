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
                <div class="card h-100">
                    <a href="#!"><img class="card-img-top" src="images/$product[image]" alt="$product[title]" /></a>
                    <div class="card-body">
                        <h4 class="card-title"><a href="#!">$product[title]</a></h4>
                        <h5>$product[price] kr</h5>
                        <p class="card-text">$product[description]</p>
                    </div>
                    <div class="card-footer"><small class="text-muted">★ ★ ★ ★ ☆</small></div>
                </div>
            </div>

        HTML;

        echo $html;
    }
}
