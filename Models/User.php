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
}
?>