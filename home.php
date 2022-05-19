<?php
// We need to use sessions, so you should always start sessions using the below code.
session_start();
// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['loggedin'])) {
    header('Location: index.php');
    exit;
}
echo <<<PAGA
<!DOCTYPE html>
<html lang="es-MX">
<head>
    <meta name="viewport" content="width=device-width initial-scale=1.0">
    <meta charset="utf-8">
    <title>My Web Page</title>
    <link rel="stylesheet" href="src/styles1.css">
    <script src="include/jquery-3.6.0.min.js"></script>
    <script>
        function dologout(){
            //console.log(' <?php include("logout.php"); ?> ');
            //$.post("logout.php");
            window.location.href="logout.php";
            //console.log(result);
        } 
    </script>
</head>
<body>
<div class="topnav">
<button type="button" onclick="dologout()" class="button button1">Logout</button>
</div>
<div class="container">
<p>
PAGA;
echo "Welcome user " . $_SESSION['name'] . <<<PAGB
</p>
</div>
</body>
</html>
PAGB;

