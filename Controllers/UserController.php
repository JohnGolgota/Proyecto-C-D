<head>
    <!-- Un problema a Arreglar -->
<link rel="shortcut icon" href="../Public/Img/favicon.png" type="image/x-icon">
</head>
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
    function AlistarInformacion($email,$contrasena)
    {
        $comprobacion = $this->ComprobarCorreo($email);
        foreach($comprobacion as $prueba){}
        if (!$prueba == "") {
            $resultado = "Ya existe una cuenta con este correo";
            die($resultado);
        }
        $this->correo_usr = $email;
        $alias = explode("@",$email);
        $this->nombre_usr = $alias[0];
        $contrasenaEncript = password_hash($contrasena,PASSWORD_ARGON2ID);
        $this->contrasena_usr = $contrasenaEncript;
        $this->RegistrarUsuario();
        // $this->RedirectLogin();
    }
}
if(!session_status() == FALSE){
    // echo "no hay sesión" . session_status();
    $usercontroler = new UserController();
    $usercontroler->VistaIndex();
}
if(isset($_GET['action']) && $_GET['action']=='registrar'){
    $usercontroler = new UserController();
    $usercontroler->VistaRegistro();
}
if(isset($_GET['a']) && $_GET['a']=='a'){
    $usercontroler = new UserController();
    $usercontroler->VistaIndex();
}
?>