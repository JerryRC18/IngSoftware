<?php

$servername = "localhost:3307";
//$username = "id17749067_root";
$username = "root";
//$password = "qYn*Ct!Cl)884itj";
$password = "1999";
//$database = "id17749067_pruebadelogin";
$database = "dentista";
/*$conn = mysqli_connect($servername, $username, $password, $database);
if (mysqli_connect_errno())
    die("Connection failed: " . mysqli_connect_error());
else
    echo "Connection sucessful <br>";*/
$conn = new mysqli($servername, $username, $password, $database);
if ($conn->connect_error) {
    $response['error'] = true;
    $response['message'] = "Connection failed: " . $conn->connect_error;
    die(json_encode($response));
}

