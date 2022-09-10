<?php
session_start();

include_once '../Models/User.php';
class UserController extends User{
    public function VistaIndex()
    {
        include '../Views/User/index.html';
    }
    public function VistaRegistro()
    {
        include '../Views/User/index.html';
    }
    public function AsignarNombre()
    {
        $nombreUsuario = "";
        $linea = $this->email_usr;
        $nombreUsuario = explode("@",$linea);
        $this->nombre_usr = $nombreUsuario[0];
        return $this->nombre_usr;
    }
}
if(!session_status() == FALSE){
    echo "no hay sesión" . session_status();
}
// $usercontroler = new UserController();
// $usercontroler->VistaIndex();
if(isset($_GET['action']) && $_GET['action']=='registrar'){
    $usercontroler = new UserController();
    $usercontroler->VistaRegistro();
}
if(isset($_GET['a']) && $_GET['a']=='a'){
    echo "a";
}
?>