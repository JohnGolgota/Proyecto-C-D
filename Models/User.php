<?php 
class User{
    protected $id_usr;
    protected $nombre_usr;
    protected $correo_usr;
    protected $contrasena_usr;
    protected $id_evn;
    protected $id_mpg;

    public function RegistrarUsuario(){
        include_once '../Config/conexiondb.php';
        $conexion = new Conexion();
        $sql = "INSERT INTO tbl_usuario (nombre_usr,correo_usr,contrasena_usr) VALUES (?,?,?)";
        $insert = $conexion->stm->prepare($sql);

        # Enviar la informacion de manera anonima.
        $insert->bindParam(1,$this->nombre_usr);
        $insert->bindParam(2,$this->correo_usr);
        $insert->bindParam(3,$this->contrasena_usr);

        $_SESSION['nombre_usr'] = $this->nombre_usr;

        $insert->execute();
        // header("location: UserController.php?action=login");
    }

    public function ComprobarCorreo($email){
        include_once '../Config/conexiondb.php';
        $conexion = new Conexion();

        $sql = "SELECT correo_usr FROM tbl_usuario WHERE correo_usr = '$email'";
        $result = $conexion->stm->prepare($sql);
        $result->execute();
        $usuario = $result->fetchAll(PDO::FETCH_OBJ);
        if ($usuario) {
            foreach($usuario as $prueba){}
            return $prueba->correo_usr;
        }
        return;
    }

    public function ConsultarUsuario($nombre_usr){
        include_once '../Config/conexiondb.php';
        $conexion = new Conexion();
        
        $sql = "SELECT * FROM tbl_usuario WHERE nombre_usr='$nombre_usr'";
        $usuario = $conexion->stm->prepare($sql);
        $usuario->execute();
        $usuarioObjeto = $usuario->fetchAll(PDO::FETCH_OBJ);
        if ($usuarioObjeto) {
            return $usuarioObjeto;
        } else {
            die("No se a encontrado el usuario en la base de datos");
        }
    }

    public function EliminarUsuario(){
        include_once '../Config/conexiondb.php';
        $conexion = new Conexion();

        $sql = "DELETE FROM tbl_usuario WHERE id_usr = '$_SESSION[id_usr]'";
        $insert = $conexion->stm->prepare($sql);

        $insert->execute();
    }

    public function traerNombreUsuario(){
        include_once '../Config/conexiondb.php';
        $conexion = new Conexion();

        $sql = "SELECT * FROM tbl_usuario WHERE id_usr = '$_SESSION[id_usr]'";
        $insert = $conexion->stm->prepare($sql);

        $insert->execute();
        $busquedaObjeto = $insert->fetchAll(PDO::FETCH_OBJ);

        return $busquedaObjeto;
    }

    public function updateNombreUsuario($nuevo_nombre){
        include_once '../Config/conexiondb.php';
        $conexion = new Conexion();

        $sql = "UPDATE tbl_usuario SET nombre_usr = '$nuevo_nombre' WHERE id_usr = '$_SESSION[id_usr]'";
        $insert = $conexion->stm->prepare($sql);

        session_start();
        $_SESSION['nombre_usr'] = $nuevo_nombre;

        $insert->execute();
    }
}
?>