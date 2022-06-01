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

    $sql="SELECT *  FROM citas";
    $query=mysqli_query($conn,$sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../assets/css/bulma.min.css">
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
                <a class="is-hidden-mobile brand is-uppercase has-text-weight-bold has-text-dark" href="../bienvenida.php">Servicios</a>
                <ul class="nav-menu-ul">
                    <li class="nav-menu-item"><a href="citas.php" class="nav-menu-link">Citas</a></li>
                    <li class="nav-menu-item"><a href="../dentistas.php"  class="nav-menu-link">Dentistas</a></li>
                    <li class="nav-menu-item"><a href="cerrar_sesion.php" class="nav-menu-link">Cerrar sesion</a></li>
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

                                    <input type="text" class="form-control mb-3" name="cit_fecha" placeholder="Fecha">
                                    <input type="text" class="form-control mb-3" name="cit_hora" placeholder="Hora">
                                    <input type="text" class="form-control mb-3" name="cit_realizada" placeholder="Realizada">
                                    <input type="text" class="form-control mb-3" name="cit_id_usu" placeholder="Id Usuario">
                                    <input type="text" class="form-control mb-3" name="cit_servicio" placeholder="Servicio. Ej: Dentista">                                                                
                                                                       
                                    <input type="submit" class="btn btn-primary">
                                    <a href="../" class="btn btn-primary">Volver</a>
                                </form>
                        </div>

                        <div class="col-md-8">
                            <table class="table" >
                                <thead class="table-success table-striped" >
                                    <tr>
                                        <th>Id Cita</th>
                                        <th>Fecha</th>
                                        <th>Hora</th>
                                        <th>Realizada</th>
                                        <th>Id Usuario</th>
                                        <th>Servicio</th>
                                        <th></th>
                                    </tr>
                                    
                                </thead>

                                <tbody>
                                        <?php
                                            while($row=mysqli_fetch_array($query)){
                                        ?>
                                            <tr>
                                                <th><?php  echo $row['cit_id']?></th>
                                                <th><?php  echo $row['cit_fecha']?></th>
                                                <th><?php  echo $row['cit_hora']?></th>
                                                <th><?php  echo $row['cit_realizada']?></th>
                                                <th><?php  echo $row['cit_id_usu']?></th>
                                                <th><?php  echo $row['cit_servicio']?></th>    
                                                <th><a href="actualizar.php?id=<?php echo $row['cit_id'] ?>" class="btn btn-info">Editar</a></th>
                                                <th><a href="delete.php?id=<?php echo $row['cit_id'] ?>" class="btn btn-danger">Eliminar</a></th>                                        
                                            </tr>
                                        <?php 
                                            }
                                        ?>
                                </tbody>
                            </table>
                        </div>
                    </div>  
            </div>
    </body>

</html>