<?php

class SignUpView
{
    public function viewHeader($title)
    {
        include_once("views/include/header.php");
    }

    public function viewFooter()
    {
        include_once("views/include/footer.php");
    }

    public function viewSignUpPage()
    {
        include_once("views/include/signUp.php");
    }

    public function viewConfirmSignUpMessage($customer)
    {
        $this->printMessage(
            "<h4>$customer du är registrerad!</h4>",
            "success"
        );
    }

    public function viewErrorMessage($customer)
    {
        $this->printMessage(
            "<h4> $customer finns problem!</h4>
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