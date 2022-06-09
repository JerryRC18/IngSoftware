<?php 
    include 'connection.php';
    $conn=conectar();

$id=$_GET['id'];

$sql="SELECT * FROM citas WHERE cit_id='$id'";
$query=mysqli_query($conn,$sql);

$row=mysqli_fetch_array($query);
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="css/style.css" rel="stylesheet">
        <title>Actualizar</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
        
    </head>
    <body>
                <div class="container mt-5">
                    <form action="update.php" method="POST">
                    
                                <input type="hidden" name="cit_id" value="<?php echo $row['cit_id']  ?>">
                                <input type="text" class="form-control mb-3" name="cit_fecha" placeholder="'1995-01-29'" value="<?php echo $row['cit_fecha'] ?>">
                                <input type="text" class="form-control mb-3" name="cit_hora" placeholder="12:00" value="<?php echo $row['cit_hora'] ?>">
                                <input type="text" class="form-control mb-3" name="cit_realizada" placeholder="Si/No" value="<?php echo $row['cit_realizada'] ?>">
                                <input type="text" class="form-control mb-3" name="cit_servicio" placeholder="Servicio" value="<?php echo $row['cit_servicio'] ?>">
                                
                            <input type="submit" class="btn btn-primary btn-block" value="Actualizar">
                    </form>
                    
                </div>
    </body>
</html>