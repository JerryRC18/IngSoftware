<?php
    // We need to use sessions, so you should always start sessions using the below code.
    session_start();
    // If the user is not logged in redirect to the login page...
    if (!isset($_SESSION['usuario'])) {
        header('Location: /index.php');
        exit;
    }
?>
<?php 
    include 'connection.php';
    $conn=conectar();
    $usuario = $_SESSION['usuario'];

    $sql="SELECT * FROM citas WHERE cit_id_usu IN (SELECT usu_id FROM usuarios WHERE usu_correo = '$usuario') ORDER BY cit_fecha";
    
    //$sql="SELECT cit_id, cit_fecha, cit_hora, cit_servicio, cit_id_usu, usuarios.usu_nombre, cit_realizada FROM citas JOIN usuarios ON cit_id_usu = usuarios.usu_id";
    $query=mysqli_query($conn,$sql);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../assets/css/bulma.min.css">
    <link rel="stylesheet" href="assets/css/styles4.css">
    <link rel="stylesheet" href="../assets/css/material-design-iconic-font.css">
    <link rel="stylesheet" href="../assets/css/styles3.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <title>Citas</title>



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
                <a class="is-hidden-mobile brand is-uppercase has-text-weight-bold has-text-dark" href="../servicios.php">SERVICIOS</a>
                <ul class="nav-menu-ul">
                    <li class="nav-menu-item"><a href="contacto.php" class="nav-menu-link">CONTACTANOS</a></li>
                    <li class="nav-menu-item"><a href="nuevacita.php" class="nav-menu-link">NUEVA CITA</a></li>
                    <li class="nav-menu-item"><a href="historialcitas.php" class="nav-menu-link">HISTORIAL DE CITAS</a></li>
                    <li class="nav-menu-item"><a href="../dentistas.php"  class="nav-menu-link">DENTISTAS</a></li>
                    <li class="nav-menu-item"><a href="cerrar_sesion.php" class="nav-menu-link">CERRAR SESION</a></li>
                    
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

                            <h1>Ingrese datos para agendar una nueva cita</h1>
                                <form action="insertar.php" method="POST">
                                    <label>Fecha</label>
                                    <input type="date" class="form-control mb-3" name="cit_fecha" placeholder="Fecha">
                                    <label>Hora</label>
                                    <input type="time" class="form-control mb-3" name="cit_hora" placeholder="Hora">
                                    
                                    <label>Usuario ID</label>
                                    <select name="cit_id_usu">
                                    <option value="0">Seleccione</option>
                                    <?php
                                        $servicios_id_usu="SELECT *  FROM usuarios WHERE usu_correo = '$usuario'";
                                        $resultado_id_usu=mysqli_query($conn,$servicios_id_usu);

                                        while ($valores_id_usu=mysqli_fetch_array($resultado_id_usu)) {
                                    
                                            echo '<option value="'.$valores_id_usu['usu_id'].'">'.$valores_id_usu['usu_id'].'</option>';
                                    
                                        }
                                    ?>
                                    </select><br><br>
                                    
                                    <label>Servicio</label>
                                    <select name="cit_servicio">
                                    <option value="0">Seleccione</option>
                                    <?php
                                        $servicios="SELECT *  FROM servicios";
                                        $resultado=mysqli_query($conn,$servicios);

                                        while ($valores=mysqli_fetch_array($resultado)) {
                                    
                                            echo '<option value="'.$valores['serv_nombre'].'">'.$valores['serv_nombre'].'</option>';
                                    
                                        }
                                    ?>
                                    </select>
                                                                                                                                         
                                    <input type="submit" class="btn btn-primary" value="Agendar">

                                </form>
                            </div>
                                   
                    </div>  
            </div>

            
    </body>

</html>