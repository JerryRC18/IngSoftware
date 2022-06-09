<?php

include 'connection.php';
$conn=conectar();

$cit_id=$_GET['id'];

$sql="DELETE FROM citas  WHERE cit_id='$cit_id'";
$query=mysqli_query($conn,$sql);

    if($query){
        Header("Location: citas.php");
    }
?>
