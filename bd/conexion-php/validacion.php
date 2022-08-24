<?php
    include './bd/conexion-php/conexiondb.php';

    $correo_usr = $_GET['correo_usr'];

    $conexion = new Conexion();
    $conexion->BdConnect();

    $sql = "SELECT * FROM tbl_usuario WHERE correo_usr=$correo_usr";

    $consulta = $conexion->stm->prepare($sql);
    $consulta->execute();

    $buscar = $bconsulta->fetchAll(PDO::FETCH_OBJ);

    # Lo recorremos y accedemos a una de sus propiedades.
    foreach ($buscar as $b){
        $id_usr = $b->id_usr;
    }

    header("location: index-user.php?id=$id_usr");
?>