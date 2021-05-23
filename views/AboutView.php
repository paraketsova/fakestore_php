<?php

class AboutView
{
    public function viewHeader($title)
    {
        include_once("views/include/header.php");
    }

    public function viewFooter()
    {
        include_once("views/include/footer-sm.php");
    }

    public function viewAboutPage()
    {
        include_once("views/include/about.php");
    }
}
