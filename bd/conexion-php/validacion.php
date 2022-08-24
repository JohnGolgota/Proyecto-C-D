<?php
    include './bd/conexion-php/conexiondb.php';

    $correo_usr = $_GET['correo_usr'];

    $conexion = new Conexion();
    $conexion->BdConnect();

    $sql = "SELECT * FROM tbl_usuario WHERE correo_usr=$correo_usr";

    $consulta = $conexion->stm->prepare($sql);
    $consulta->execute();

    $buscar = $consulta->fetchAll(PDO::FETCH_OBJ);
    var_dump($buscar);

    # Lo recorremos y accedemos a una de sus propiedades.
    foreach ($buscar as $b){}

    // header("location: index-user.php?id=$b->id_usr");
?>