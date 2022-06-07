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
     window.location = "../php/citas.php";
 </script>
';
exit();
}

$sql="INSERT INTO citas (cit_fecha, cit_hora, cit_id_usu, cit_servicio) VALUES('$fecha','$hora','$usu_id','$servicios')";
$query= mysqli_query($conn,$sql);

if($query){
    Header("Location: citas.php");
    
}else {
}
?>