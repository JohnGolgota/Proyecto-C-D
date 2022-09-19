<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Carpe Diem | Actualizar </title>
</head>
<body>
    <h1> ¿Deseas Actualizar tu Nombre? </h1>

    <label for=""> Nombre Actual: 
    <?php 
        echo $_SESSION[nombre_usr]; 
    ?>
    </label>
    <input type="text" value="<?php echo $_SESSION[id_usr]; ?>">
</body>
</html>