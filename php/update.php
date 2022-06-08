<?php

include 'connection.php';
$conn=conectar();

$cit_id=$_POST['cit_id'];
$fecha=$_POST['cit_fecha'];
$hora=$_POST['cit_hora'];
$realizada=$_POST['cit_realizada'];


$sql="UPDATE citas SET cit_fecha='$fecha', cit_hora='$hora', cit_realizada='$realizada'  WHERE cit_id='$cit_id'";
$query=mysqli_query($conn,$sql);

    if($query){
        Header("Location: historialcitas.php");
    }
?>