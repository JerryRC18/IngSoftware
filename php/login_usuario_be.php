<?php

    session_start();
    header("Access-Control-Allow-Origin: *");

    include 'connection.php';
    $conn=conectar();

    
    

    $correo = $_POST['correo'];
    $password = $_POST['password'];
    //$password = hash('sha512', $password);

    //$validar_login = mysqli_query($conn, "SELECT * FROM usuarios WHERE correo='$correo' and password='$password'");
    $validar_login = mysqli_query($conn, "SELECT * FROM usuarios WHERE usu_correo = '$correo' and usu_contrasena = '$password'");

    if(mysqli_num_rows($validar_login) > 0){
        $_SESSION['usuario']= $correo;
        header("location: ../bienvenida.php");
        exit();
    }else{
        echo '
            <script>
                alert("Usuario no existe, por favor verifique los datos");
                window.location = "../index.php";
            </script>
        ';
        exit();
    }

    ?>