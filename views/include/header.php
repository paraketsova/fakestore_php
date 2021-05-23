<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>WebShop</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <link href="<?= URLROOT ?>/styles/styles.css" rel="stylesheet">
</head>

<body>
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="<?= URLROOT ?>">WebShop</a>
            <div class="navbar-brand"><?= isset($_SESSION['email']) ? $_SESSION['email'] : "" ?></div>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="<?= URLROOT ?>">
                            Home
                            <span class="sr-only">(current)</span>
                        </a>
                    </li>
                    <li class="nav-item"><a class="nav-link" href="<?= URLROOT ?>/about">About</a></li>
                    <li class="nav-item"><a class="nav-link" href="<?= URLROOT ?>/login">Log in</a></li>
                    <li class="nav-item"><a class="nav-link" href="<?= URLROOT ?>/logout">Log out</a></li>
                    <li class="nav-item"><a class="nav-link" href="<?= URLROOT ?>/signup">Sign up</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Page Content-->
    <div class="container my-4">
        <!--  <div class="row my-4">
             <div class="col-lg-3">
               <h1 class="my-4">Shop Name</h1> 
                <div class="list-group">
                    <a class="list-group-item" href="#!">Category 1</a>
                    <a class="list-group-item" href="#!">Category 2</a>
                    <a class="list-group-item" href="#!">Category 3</a>
                </div> 
        </div>-->
        <div class="col-lg-12">
            <div class="row">