<head></head><body></body>
<?php
    session_start();
    include 'conexiondb.php';

    # Tambien verificamos que NO este vacio.
    if(!empty($_POST['UsuarioIS']) && !empty($_POST['ContrasenaIS'])){

        $conexion = new Conexion();
        $conexion->BdConnect();

        $nombre = $_POST['UsuarioIS'];
        $contrasena = $_POST['ContrasenaIS'];

        # Hacemos una consulta.
        $sql = "SELECT * FROM tbl_usuario WHERE nombre_usr = '.$nombre' AND contrasena_usr = '.$contrasena'";

        $consulta = $conexion->stm->prepare($sql);
        $consulta->execute();

        $objeto = $consulta->fetch(PDO::FETCH_OBJ);
        // var_dump($objeto);

        if($objeto == TRUE){
            header('location: ../../index-user');
        } else {
            echo 'no existis capo';
        }

        // # Creacion y preparamos la sentencia inmediatamente (en la misma linea).
        // $conexion->stm->prepare("SELECT id_usr, nombre_usr, correo_usr, contrasena_usr FROM tbl_usuario WHERE nombre_usr=:UsuarioIS");
        // // $busqueda = $conexion->stm->prepare($consulta); // $consulta->bindParam(':nombre_usr', $_POST['UsuarioIS']); // $busqueda->execute();
        
        // $conexion->bindParam(':nombre_usr', );
        // $conexion->execute();

        // # Se convierte en un array asociativo.
        // $resultado = $conexion->fetch(PDO::FETCH_ASSOC);

        // /* Si $Resultado es mayor a '0' (lo que sugiere que encontr un registro) y la contraseña que ingreso el usuario es igual
        //     a la que se encontro en la base de datos, hacer: */
        // if(is_countable($resultado) > 0 && password_verify($_POST['ContrasenaIS'], $resultado['contrasena_usr'])){
        //     $_SESSION['user_id'] = $resultado['id_usr'];
        //     header('location: ../../index-user.html');
        // }
        // else {
        //     echo 'No existis capo';
        // }
    }



?>