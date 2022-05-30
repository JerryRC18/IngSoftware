<?php
include 'connection.php';
$conn=conectar();


$fecha=$_POST['cit_fecha'];
$hora=$_POST['cit_hora'];
$realizada=$_POST['cit_realizada'];


$sql="INSERT INTO citas VALUES(' ','$fecha','$hora','$realizada')";
$query= mysqli_query($conn,$sql);

if($query){
    Header("Location: citas.php");
    
}else {
}
?>