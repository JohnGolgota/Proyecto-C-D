<head></head><body></body>
<?php
    include 'conexiondb.php';

    $conexion = new Conexion();
    $conexion->BdConnect();

    if(!empty($_POST['UsuarioIS']) && !empty($_POST['ContrasenaIS'])){
        # Obtenemos valores.
        $nombreUsuario = $_POST['UsuarioIS'];
        $contrasena = $_POST['ContrasenaIS'];

        # Este es el script sql.
        $sql = "SELECT * FROM tbl_usuario WHERE nombre_usr = '$nombreUsuario'";

        $buscar = $conexion->stm->prepare($sql);
        $buscar->execute();

        # Convertimos el script en un objeto.
        $r = $buscar->fetchAll(PDO::FETCH_OBJ);

        # Lo recorremos y accedemos a una de sus propiedades.
        foreach ($r as $row){
            $contrasenadb = $row->contrasena_usr;
            $usuariodb = $row->nombre_usr;
        }

        if(($usuariodb == $nombreUsuario) && (password_verify($contrasena, $contrasenadb))){
            header('Location: ../../index-user.html');
        } else {

        }
    } else {
        echo "<script src='../../scripts/sweetalert.min.js'></script>
              <script></script>";    
    }
?>