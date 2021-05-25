<?php

class SignUpView
{
    public function viewHeader()
    {
        include_once("views/include/header.php");
    }

    public function viewFooter()
    {
        include_once("views/include/footer-sm.php");
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

    public function viewErrorMessage()
    {
        $this->printMessage(
            "<h4> Opps här finns problem!</h4>
            <h5>Kontakta kundtjänst, det email finns i vårt kundregister.</h5>
            ",
            "warning"
        );
    }

    public function viewErrorPasswordMessage()
    {
        $this->printMessage(
            "<h4> Lösenordet måste bli bekräftad </h4>
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