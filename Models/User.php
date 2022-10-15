<?php 
class User{
    protected $id_usr;
    protected $nombre_usr;
    protected $correo_usr;
    protected $contrasena_usr;
    // protected $id_evn;
    // protected $id_mpg;

    public function RegistrarUsuario(){
        include_once '../Config/conexiondb.php';
        $conexion = new Conexion();
        $sql = "CALL SetUser_usr(?,?,?)";
        $insert = $conexion->stm->prepare($sql);

        # Enviar la informacion de manera anonima.
        $insert->bindParam(1,$this->nombre_usr);
        $insert->bindParam(2,$this->correo_usr);
        $insert->bindParam(3,$this->contrasena_usr);

        $_SESSION['nombre_usr'] = $this->nombre_usr;
        $_SESSION['correo_usr'] = $this->correo_usr;

        $insert->execute();
        // header("location: UserController.php?action=login");
    }
// Puto
    public function ComprobarCorreo($email){
        include_once '../Config/conexiondb.php';
        $conexion = new Conexion();

        $sql = "CALL ReadEmail_usr('$email')";
        $result = $conexion->stm->prepare($sql);
        $result->execute();
        $usuario = $result->fetchAll(PDO::FETCH_OBJ);
        if ($usuario) {
            foreach($usuario as $prueba){}
            return $prueba->correo_usr;
        }
        return;
    }
// puto 2
    public function ConsultarUsuario($nombre_usr){
        include_once '../Config/conexiondb.php';
        $conexion = new Conexion();
        
        $sql = "CALL GetDataName_usr('$nombre_usr')";
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

        $sql = "CALL Delete_usr('$_SESSION[id_usr]')";
        $insert = $conexion->stm->prepare($sql);

        $insert->execute();
    }

    public function traerNombreUsuario(){
        include_once '../Config/conexiondb.php';
        $conexion = new Conexion();

        $sql = "CALL GetDataId_usr('$_SESSION[id_usr]')";
        $insert = $conexion->stm->prepare($sql);

        $insert->execute();
        $busquedaObjeto = $insert->fetchAll(PDO::FETCH_OBJ);

        return $busquedaObjeto;
    }

    public function updateNombreUsuario($nuevo_nombre, $nuevo_correo){
        include_once '../Config/conexiondb.php';
        $conexion = new Conexion();

        $sql = "CALL Update_usr('$nuevo_nombre','$nuevo_correo','$_SESSION[id_usr]')";
        $insert = $conexion->stm->prepare($sql);
        // Para hacer las siguientes lineas deberia haber un try catch
        // En todo deberia haber un try catch
        // session_start();
        $_SESSION['nombre_usr'] = $nuevo_nombre;
        $_SESSION['correo_usr'] = $nuevo_correo;

        $insert->execute();
    }

    public function updateContrasena(){
        include_once '../Config/conexiondb.php';
        $conexion = new Conexion();

        $sql = "CALL UpdatePass_usr('$this->contrasena_usr','$_SESSION[id_usr]')";
        $actualizacion = $conexion->stm->prepare($sql);

        $actualizacion->execute();
    }
}
?>