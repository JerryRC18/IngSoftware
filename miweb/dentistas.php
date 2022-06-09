<?php
    // We need to use sessions, so you should always start sessions using the below code.
    session_start();
    // If the user is not logged in redirect to the login page...
    if (!isset($_SESSION['usuario'])) {
        header('Location: index.php');
        exit;
    }
?>
<?php 
    include 'php/connection.php';
    $conn=conectar();

    $sql="SELECT *  FROM dentistas";
    $query=mysqli_query($conn,$sql);
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <title>Dentistas</title>



    <!-- Barra de navegación -->
<header>
        <nav class="navbar-top">
            <ul class="navbar-top-ul">
                <li class="navbar-top-item">
                    <a href="#" class="navbar-top-links">
                        <i class="nav-menu-item"></i>
                    </a>
                </li>
            </ul>
        </nav>

        <nav class="nav-menu" id="mySidenav">
                <a class="is-hidden-mobile brand is-uppercase has-text-weight-bold has-text-dark" href="servicios.php">SERVICIOS</a>
                <ul class="nav-menu-ul">
                <li class="nav-menu-item"><a href="php/contacto.php" class="nav-menu-link">CONTACTANOS</a></li>
                    <li class="nav-menu-item"><a href="php/nuevacita.php" class="nav-menu-link">NUEVA CITA</a></li>
                    <li class="nav-menu-item"><a href="php/historialcitas.php" class="nav-menu-link">HISTORIAL DE CITAS</a></li>
                    <li class="nav-menu-item"><a href="dentistas.php"  class="nav-menu-link">DENTISTAS</a></li>
                    <li class="nav-menu-item"><a href="php/cerrar_sesion.php" class="nav-menu-link">CERRAR SESION</a></li>
                </ul>
            </nav>
        </nav>

</header>
</head>
<br><br><br><br><br>

    <body>
            <div class="container mt-5">
                    <div class="row"> 
                        
                        <div class="col-md-3">
                            <h1>Nuestros dentistas</h1>
                        </div>

                        <div class="col-md-8">
                        <div class="container">
        <div class="columns is-multiline">
            <div class="column is-full-mobile">
                <div class="columns is-centered is-mobile is-multiline">
                    <!-- 1 Sección de fotografías -->
                    <div class="column is-half column-full">
                        <div class="card">
                            <span class="price"></span>
                            <img src="assets/images/dentista1.jpeg" alt="">
                            <div class="card-info">
                                <h4 class="has-text-black has-text-centered has-text-weight-bold"> Erick Alexander Vazquez Barrios</h4>
                                <p class="has-text-centered">Odontologo con 7 años de experiencia, egresado de la UNAM</p>
                            </div>
                        </div>
                    </div>
                    <div class="column column-full is-half">
                        <div class="card">
                            <span class="price"></span>
                            <img src="assets/images/dentista2.jpeg" alt="">
                            <div class="card-info">
                                <h4 class="has-text-black has-text-centered has-text-weight-bold"> Eduardo Garcia Cisneros</h4>
                                <p class="has-text-centered">Ortodoncista con 5 años de esperiencia, egresado de la UG</p>
                            </div>
                        </div>
                    </div>

                    <div class="column is-full">
                        <div class="card">
                            <span class="price"></span>
                            
                                <img src="assets/images/dentista3.jpg" alt="">
                            <div class="card-info">
                                <h4 class="has-text-black has-text-centered has-text-weight-bold"> Andrea Martinez</h4>
                                <p class="has-text-centered">Odontologa especialista en extracción con 4 años de experiencia, egresada de la UG</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
                        </div>
                    </div>  
            </div>

    </body>

</html>