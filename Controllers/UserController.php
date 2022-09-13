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
    public function VistaUsuario()
    {
        include '../Views/User/Index-user.php';
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
        if ($cContrasena !== $contrasena) {
            die("Las Contraseñas no coinciden");
        }
        if (strlen($_POST['UsuarioRC']) < 4) {
            die('La contraseña debe tener al menos 4 caracteres.');
        }
        if (strlen($_POST['UsuarioRC']) > 10) {
            die('La contraseña no puede tener mas de 10 caracteres.');
        }
        if (!preg_match('`[a-z]`', $_POST['UsuarioRC'])) {
            die('La contraseña debe tener al menos una letra minuscula.');
        }
        if (!preg_match('`[0-9]`', $_POST['UsuarioRC'])) {
            die('La contraseña debe tener al menos un numero.');
        }
        $this->correo_usr = $email;
        $alias = explode("@",$email);
        $this->nombre_usr = $alias[0];
        $contrasenaEncript = password_hash($contrasena,PASSWORD_ARGON2ID);
        $this->contrasena_usr = $contrasenaEncript;
        $this->RegistrarUsuario();
        $this->RedirectLogin();
        return;
    }
    public function VerificaInicio($nombre,$contrasena)
    {
        $this->nombre_usr = $nombre;
        $this->contrasena_usr = $contrasena;
        $datosUsuario = $this->ConsultarUsuario($nombre);
        foreach ($datosUsuario as $dU) {}
        if (password_verify($contrasena,$dU->contrasena_usr)) {
            $_SESSION['nombre_usr'] = $dU->nombre_usr;
            header("location: UserController.php?action=inicio");
            return;
        }
        else {
            var_dump($datosUsuario);
            die("Fallo al intentar iniciar session");
        }
    }
}
// Action Registro
if(isset($_GET['action']) && $_GET['action']=='registrar' && !empty($_POST['UsuarioRE'] && $_POST['UsuarioRC'] && $_POST['UsuarioRCC'] && $_POST['terminosycondiciones'])){
    $usercontroler = new UserController();
    $usercontroler->AlistarInformacion($_POST['UsuarioRE'],$_POST['UsuarioRC'],$_POST['UsuarioRCC']);
    // Por Probar: consulta e inicia session en el registro
    return;
}
// Action registro fallido
if (isset($_GET['action']) && $_GET['action']=='registrar' && empty($_POST['UsuarioRE'] || $_POST['UsuarioRC'] || $_POST['UsuarioRCC'])) {
    die("Por favor rellene todos los campos de registro. ʕっ•ᴥ•ʔっ ♡");
}
// inicio de session
if (isset($_GET['action']) && $_GET['action']=='session' && !empty($_POST['UsuarioIS']) && !empty($_POST['ContrasenaIS'])) {
    echo "holiwi";
    $usercontroler = new UserController();
    $usercontroler->VerificaInicio($_POST['UsuarioIS'],$_POST['ContrasenaIS']);
    return;
}
//  inicio de session fallido
if (isset($_GET['action']) && $_GET['action']=='session' && empty($_POST['UsuarioIS'] || $_POST['ContrasenaIS'])) {
    echo "Camopos no validos";
    return;
}
if (isset($_GET['action']) && $_GET['action']=='inicio') {
    $usercontroler = new UserController();
    $usercontroler->VistaUsuario();
    return;
}
// Action vista predefinida
if(session_status() == 1){
    $usercontroler = new UserController();
    $usercontroler->VistaIndex();
    return;
}

?>