<?php
    include 'connection.php';
    $conn=conectar();

    $nombre_completo = $_POST['nombre_completo'];
    $correo = $_POST['correo'];
    $telefono = $_POST['usuario'];
    $password = $_POST['password'];
    
    //encriptación de contraseña
    //$password = hash('sha512', $password);

    $query = "INSERT INTO usuarios(usu_nombre, usu_correo, usu_telefono, usu_contrasena)
              VALUES('$nombre_completo','$correo','$telefono','$password')";
    

    
    //Verifica que los campos no esten vacios
    //$verificar_usuario = mysqli_query($conn, "SELECT * FROM usuarios WHERE usu_nombre = '$nombre_completo' ");
    if($nombre_completo == '' || $correo == '' || $telefono == '' || $password == ''){
               echo '
            <script>
                alert("Todos los campos deben llenarse");
                window.location = "../index.php";
            </script>
       ';
       exit();
    }

    //Verificar que el correo no se repita en la db
    $verificar_correo = mysqli_query($conn, "SELECT * FROM usuarios WHERE usu_correo = '$correo' ");
    if(mysqli_num_rows($verificar_correo) > 0){
       echo '
            <script>
                alert("Este correo ya esta registrado, intenta con otro diferente");
                window.location = "../index.php";
            </script>
       ';
       exit();
    }

    //Verificar que el nombre de usuario no se repita en la db
    $verificar_usuario = mysqli_query($conn, "SELECT * FROM usuarios WHERE usu_nombre = '$nombre_completo' ");
    if(mysqli_num_rows($verificar_usuario) > 0){
       echo '
            <script>
                alert("Este usuario ya esta registrado, intenta con otro diferente");
                window.location = "../index.php";
            </script>
       ';
       exit();
    }

    $ejecutar = mysqli_query($conn, $query);

    if($ejecutar){
        echo '
            <script>
                alert("Usuario almacenado exitosamente");
                window.location = "../index.php";
            </script>
        ';
    }else{
        echo '
            <script>
                alert("Intentelo nuevamente, usuario no almacenado");
                window.location = "../index.php";
            </script>
        ';
    }

    mysqli_close($conn);

?>