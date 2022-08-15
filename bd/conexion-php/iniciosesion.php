<head></head><body></body>
<?php
    session_start();
    include 'conexiondb.php';

    $conexion = new Conexion();
    $conexion->BdConnect();

    # Tambien verificamos que NO este vacio.
    if(!empty($_POST['UsuarioIS']) && !empty($_POST['ContrasenaIS'])){
        # Creacion y preparamos la sentencia inmediatamente (en la misma linea).
        $conexion->$stm->prepare("SELECT id_usr, nombre_usr, correo_usr, contrasena_usr FROM tbl_usuario WHERE nombre_usr=:UsuarioIS");
        // $busqueda = $conexion->stm->prepare($consulta); // $consulta->bindParam(':nombre_usr', $_POST['UsuarioIS']); // $busqueda->execute();
        
        $records->bindParam(':nombre_usr', $_POST['UsuarioIS']);
        $records->execute();

        # Se convierte en un array asociativo.
        $resultado = $records->fetch(PDO::FETCH_ASSOC);

        /* Si $Resultado es mayor a '0' (lo que sugiere que encontr un registro) y la contraseña que ingreso el usuario es igual
            a la que se encontro en la base de datos, hacer: */
        if(is_countable($resultado) > 0 && password_verify($_POST['ContrasenaIS'], $resultado['contrasena_usr'])){
            $_SESSION['user_id'] = $resultado['id_usr'];
            header('location: ../../index-user.html');
        }
        else {
            echo 'No existis capo';
        }
    }



?>