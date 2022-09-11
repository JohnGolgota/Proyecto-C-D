<?php 
class User{
    protected $id_usr;
    protected $nombre_usr;
    protected $correo_usr;
    protected $contrasena_usr;
    protected $id_evn;
    protected $id_mpg;

    public function RegistrarUsuario()
    {
        include_once '../Config/conexiondb.php';
        $conexion = new Conexion();
        $sql = "INSERT INTO tbl_usuario (nombre_usr,correo_usr,contrasena_usr) VALUES (?,?,?)";
        $insert = $conexion->stm->prepare($sql);
        $insert->bindParam(1,$this->nombre_usr);
        $insert->bindParam(2,$this->correo_usr);
        $insert->bindParam(3,$this->contrasena_usr);
        $insert->execute();
    }
    public function ComprobarCorreo($email)
    {
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
}
?>