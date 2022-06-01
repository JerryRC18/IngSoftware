<?php
include 'connection.php';
$conn=conectar();


$fecha=$_POST['cit_fecha'];
$hora=$_POST['cit_hora'];
$realizada=$_POST['cit_realizada'];
$usu_id=$_POST['cit_id_usu'];
$servicios=$_POST['cit_servicio'];


$sql="INSERT INTO citas VALUES('','$fecha','$hora','$realizada','$usu_id','$servicios')";
$query= mysqli_query($conn,$sql);

if($query){
    Header("Location: citas.php");
    
}else {
}
?>