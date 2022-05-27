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
    <link rel="stylesheet" href="assets/css/styles3.css?v=<?php echo(rand()); ?>" />
    <script src="/js/mi_script.js?v=<?php echo(rand()); ?>"></script>
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
                    <li class="nav-menu-item"><a href="About.php" class="nav-menu-link">About Us</a></li>
                    <li class="nav-menu-item"><a href="php/cerrar_sesion.php" class="nav-menu-link">Cerrar sesion</a></li>
                </ul>
            </nav>
        </nav>
    </header>
    <!-- Banner -->
    <div class="banner banner-cover">
        <div class="banner-container ">
            <h1 class="title-cover">MOTHR</h1>
        </div>
    </div>

    <!-- Barra de navegacion secundaria -->
    <div class="container">
        <nav class="nav">
            <a class="nav-item active has-text-weight-semibold" href="#">Popular</a>
            <a class="nav-item has-text-weight-semibold" href="#">Novedades</a>
            <a class="nav-item has-text-weight-semibold" href="#">Más vendidos</a>
        </nav>
    </div>
    <!-- Sección de fotografías -->
    <div class="container">
        <div class="columns is-multiline">
            <div class="column is-full-mobile">
                <div class="columns is-centered is-mobile is-multiline">
                    <!-- 1 Sección de fotografías -->
                    <div class="column is-half column-full">
                        <div class="card">
                            <span class="price">$12999</span>
                            <img src="assets/img/item-1.jpg" alt="">
                            <div class="card-info">
                                <h4 class="has-text-black has-text-centered has-text-weight-bold"> PC Gamer gama media</h4>
                                <p class="has-text-centered">Pc especializada para videojuegos de gama baja</p>
                            </div>
                        </div>
                    </div>
                    <div class="column column-full is-half">
                        <div class="card">
                            <span class="price">$16999</span>
                            <img src="assets/img/item-2.jpg" alt="">
                            <div class="card-info">
                                <h4 class="has-text-black has-text-centered has-text-weight-bold"> PC Gamer gama media-alta</h4>
                                <p class="has-text-centered">Pc gamer con funcionalidad de trasminitir video en stream</p>
                            </div>
                        </div>
                    </div>

                    <div class="column is-full">
                        <div class="card">
                            <span class="price">$18999</span>
                            
                                <img src="assets/img/item-3.jpg" alt="">
                            <div class="card-info">
                                <h4 class="has-text-black has-text-centered has-text-weight-bold"> PC Gamer gama Alta</h4>
                                <p class="has-text-centered">PC gamer de alto rendimiento con posibilidad de hacer stream de video en calidad alta</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Segunda sección de fotografías -->
            <div class="column is-half is-full-mobile">
                <div class="columns is-mobile is-multiline">
                    <div class="column is-full">
                        <div class="card">
                            <span class="price">$5999</span>
                                <img src="assets/img/item-4.jpg" alt="">
                            <div class="card-info">
                                <h4 class="has-text-black has-text-centered has-text-weight-bold">Computadora basica para ofimatica</h4>
                                <p class="has-text-centered"> Ideal para tareas sencillas</p>
                            </div>
                        </div>
                    </div>
                    <div class="column column-full is-half">
                        <div class="card">
                            <span class="price">$4999</span>
                            <img src="assets/img/item-5.jpg" alt="">
                            <div class="card-info">
                                <h4 class="has-text-black has-text-centered has-text-weight-bold">Computadora basica para clases en linea</h4>
                                <p class="has-text-centered">Ideal para poder llevar a cabo tareas y clases en linea</p>
                            </div>
                        </div>
                    </div>
                    <div class="column column-full is-half">
                        <div class="card">
                            <span class="price">$6999</span>
                            <img src="assets/img/item-6.jpg" alt="">
                            <div class="card-info">
                                <h4 class="has-text-black has-text-centered has-text-weight-bold">Computadora basica</h4>
                                <p class="has-text-centered">Ideal para diversas tareas y entrenimiento</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="js/main.js"></script>
</body>

</html>