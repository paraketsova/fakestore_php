<?php

class LoginView
{
    public function viewHeader($title)
    {
        include_once("views/include/header.php");
    }

    public function viewFooter()
    {
        include_once("views/include/footer-sm.php");
    }

    public function viewLoginPage()
    {
        include_once("views/include/login.php");
    }

    public function viewConfirmLoginMessage($customer)
    {
        $this->printMessage(
            "<h4>$customer du är inlogged!</h4>",
            "success"
        );
    }

    public function viewErrorMessage()
    {
        $this->printMessage(
            "<h4> Fell email eller lösenord </h4>
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

}