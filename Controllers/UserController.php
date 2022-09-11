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
    function AlistarInformacion($email,$contrasena,$cContrasena)
    {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            die("Introduzca una dirección de correo electronico valido");
        }
        $comprobacion = $this->ComprobarCorreo($email);
        if ($comprobacion != "") {
            die("Ya existe una cuenta con este correo");
        }
        if ($cContrasena != $contrasena) {
            die("Las Contraseñas no coinciden");
        }
        if (strlen($contrasena) < 4 || strlen($contrasena) > 10) {
            die("la contraseña debe tener minimo 4 o no sobre pasar los 10 caracteres");
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
if(isset($_GET['action']) && $_GET['action']=='registrar' && !empty($_POST['UsuarioRE'] && $_POST['UsuarioRC'] && $_POST['UsuarioRCC'] && $_POST['terminosycondiciones'])){
    $usercontroler = new UserController();
    $usercontroler->AlistarInformacion($_POST['UsuarioRE'],$_POST['UsuarioRC'],$_POST['UsuarioRCC']);
    $usercontroler->RedirectLogin();
    return;
}
if (isset($_GET['action']) && $_GET['action']=='registrar' && empty($_POST['UsuarioRE'] || $_POST['UsuarioRC'] || $_POST['UsuarioRCC'])) {
    die("Por favor rellene todos los campos de registro.");
}
if(session_status() == 1){
    $usercontroler = new UserController();
    $usercontroler->VistaIndex();
    return;
}

?>