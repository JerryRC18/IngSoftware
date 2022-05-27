<?php
    // We need to use sessions, so you should always start sessions using the below code.
    session_start();
    // If the user is not logged in redirect to the login page...
    if (!isset($_SESSION['usuario'])) {
        header('Location: index.php');
        exit;
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="assets/css/bulma.min.css">
    <link rel="stylesheet" href="assets/css/material-design-iconic-font.css">
    <link rel="stylesheet" href="assets/css/styles3.css">
    <title>Document</title>
</head>

<body>
    <!-- Barra de navegación -->
<header>
        <nav class="navbar-top">
            <ul class="navbar-top-ul">
                <li class="navbar-top-item">
                    <a href="#" class="navbar-top-links">
                        <i class="nav-menu-item"></i> Carrito
                    </a>
                </li>
            </ul>
        </nav>
            </header>
            <nav class="nav-menu" id="mySidenav">
                <a class="is-hidden-mobile brand is-uppercase has-text-weight-bold has-text-dark" href="bienvenida.php">Motherboard</a>
                <ul class="nav-menu-ul">
                    <li class="nav-menu-item"><a href="valores.php" class="nav-menu-link">M/V/V</a></li>
                    <li class="nav-menu-item"><a href="About.php"  class="nav-menu-link">About Us</a></li>
                    <li class="nav-menu-item"><a href="php/cerrar_sesion.php" class="nav-menu-link">Cerrar sesion</a></li>
                </ul>
            </nav>
        </nav>
            <!-- Banner -->
    <div class="banner banner-cover">
        <div class="banner-container ">
            <h1 class="title-cover">MOTHR</h1>
        </div>
    </div>
        <br>
        <div class="container">
        <div class="card">
            <div class="card-info">
                <h1 class="has-text-black has-text-centered has-text-weight-bold">Sobre MotherBoard</h1>
                <p class="has-text-centered">MotherBoard es una marca dedicada a la venta de dispositivos computacionales. Centrada en el harware, la empresa ofrece productos de distintas marcas para que cada consumidor pueda encontrar sus dispositivos preferidos.</p>
            </div>

        </div>
        <div class="card">
            <div class="card-info">
                <h1 class="has-text-black has-text-centered has-text-weight-bold">Aplicaciones de internet</h1>
                <p class="has-text-centered">Proyecto final</p>
                <p class="has-text-centered">Este proyecto fue creado por: </p>
                <p class="has-text-centered">GIOVANNI DANIEL AGUIRRE SALINAS</p>
                <p class="has-text-centered">ADRIAN FEDERICO SALDAÑA AGUILAR</p>
            </div>

        </div>
    </div>
    </header>
    <script src="js/main.js"></script>


</body>

</html>