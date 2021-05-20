<?php

class LoginView
{
    public function viewHeader($title)
    {
        include_once("views/include/header.php");
    }

    public function viewFooter()
    {
        include_once("views/include/footer.php");
    }

    public function viewLoginPage()
    {
        include_once("views/include/login.php");
    }

    public function viewConfirmLoginMessage($customer)
    {
        $this->printMessage(
            "<h4>$customer you logged in</h4>",
            "success"
        );
    }

    public function viewErrorMessage($customer)
    {
        $this->printMessage(
            "<h4> $customer finns ej i vårt kundregister!</h4>
            <h5>Kontakta kundtjänst</h5>
            </div> <!-- col  avslutar Beställningsformulär -->
            ",
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

}