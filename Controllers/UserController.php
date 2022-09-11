<head>
    <!-- Un problema a Arreglar -->
<link rel="shortcut icon" href="../Public/Img/favicon.png" type="image/x-icon">
</head>
<?php
// session_start();

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
    public function RedirectLogin()
    {
        include '../Views/User/login.php';
    }
    function AlistarInformacion($email,$contrasena)
    {
        $comprobacion = $this->ComprobarCorreo($email);
        if ($comprobacion != "") {
            $resultado = "Ya existe una cuenta con este correo";
            die($resultado);
        }
        $this->correo_usr = $email;
        $alias = explode("@",$email);
        $this->nombre_usr = $alias[0];
        $contrasenaEncript = password_hash($contrasena,PASSWORD_ARGON2ID);
        $this->contrasena_usr = $contrasenaEncript;
        // $this->RegistrarUsuario();
        // $this->RedirectLogin();
        return;
    }
}
if(isset($_GET['action']) && $_GET['action']=='registrar'){
    $usercontroler = new UserController();
    $usercontroler->AlistarInformacion($_POST['UsuarioRE'],$_POST['UsuarioRC']);
    $usercontroler->RedirectLogin();
    return;
}
if(session_status() == 1){
    $usercontroler = new UserController();
    $usercontroler->VistaIndex();
    return;
}

?>