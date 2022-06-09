<?php
include 'connection.php';
$conn=conectar();


$fecha=$_POST['cit_fecha'];
$hora=$_POST['cit_hora'];
$usu_id=$_POST['cit_id_usu'];
$servicios=$_POST['cit_servicio'];

if($fecha == '' || $hora == '' || $usu_id == '' || $servicios == ''){
    echo '
 <script>
     alert("Todos los campos deben llenarse");
     window.location = "../php/nuevacita.php";
 </script>
';
exit();
}

if($usu_id == 0 ){
    echo '
 <script>
     alert("Todos los campos deben llenarse");
     window.location = "../php/nuevacita.php";
 </script>
';
exit();
}

if($servicios == 0 ){
    echo '
 <script>
     alert("Todos los campos deben llenarse");
     window.location = "../php/nuevacita.php";
 </script>
';
exit();
}

//Verificar que la fecha no se repita en la db
$verificar_fecha = mysqli_query($conn, "SELECT cit_fecha, cit_hora FROM citas WHERE cit_fecha = '$fecha' AND cit_hora = '$hora'");
if(mysqli_num_rows($verificar_fecha) > 0){
   echo '
        <script>
            alert("Esta fecha y hora ya esta registrada, intenta con otra diferente");
            window.location = "../php/nuevacita.php";
        </script>
   ';
   exit();
}

$sql="INSERT INTO citas (cit_fecha, cit_hora, cit_id_usu, cit_servicio) VALUES('$fecha','$hora','$usu_id','$servicios')";
$query= mysqli_query($conn,$sql);

if($query){
    Header("Location: nuevacita.php");
    
}else {
}
?>

