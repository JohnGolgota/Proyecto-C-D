<head>
    <!-- Un problema a Arreglar -->
    <link rel="shortcut icon" href="../Public/Img/favicon.png" type="image/x-icon">
</head>
<body>
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

    # Alistar informacion para registrarse
    function AlistarInformacion($email,$contrasena,$cContrasena)
    {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            # Return + echo = die
            die("Introduzca una dirección de correo electronico valido");
        }

        # Si retorna un elemento en vez de nada, entonces rompe.
        $comprobacion = $this->ComprobarCorreo($email);
        if ($comprobacion != "") {
            die("Ya existe una cuenta con este correo");
        }
        if ($cContrasena !== $contrasena) {
            die("Las Contraseñas no coinciden");
        }

        # strlen Idenfifica Cuantos caracteres hay
        if (strlen($_POST['UsuarioRC']) < 4) {
            die('La contraseña debe tener al menos 4 caracteres.');
        }
        if (strlen($_POST['UsuarioRC']) > 10) {
            die('La contraseña no puede tener mas de 10 caracteres.');
        }

        # preg_match Exige que la contraseña tenga al menos un caracter del diccionario especificado.
        if (!preg_match('`[a-z]`', $_POST['UsuarioRC'])) {
            die('La contraseña debe tener al menos una letra minuscula.');
        }
        if (!preg_match('`[0-9]`', $_POST['UsuarioRC'])) {
            die('La contraseña debe tener al menos un numero.');
        }

        # Si todo es correcto, hacer:
        $this->correo_usr = $email;
        $alias = explode("@",$email);
        $this->nombre_usr = $alias[0];
        $contrasenaEncript = password_hash($contrasena,PASSWORD_ARGON2ID);
        $this->contrasena_usr = $contrasenaEncript;
        $this->RegistrarUsuario();
        $this->VistaUsuario();

        $datosUsuario = $this->ConsultarUsuario($nombre);
        
        session_start();
        $_SESSION['nombre_usr'] = $dU->nombre_usr;

        return;
        # Roto: Arreglar porque no redirige al Pagina index del usuario.
    }

    # Verificamos la informacion de inicio de sesion.
    public function VerificaInicio($nombre,$contrasena)
    {
        $this->nombre_usr = $nombre;
        $this->contrasena_usr = $contrasena;
        $datosUsuario = $this->ConsultarUsuario($nombre);

        # Recorremos el objeto que obtenemos en el model.
        foreach ($datosUsuario as $dU) {}
        if (password_verify($contrasena,$dU->contrasena_usr)) {
            session_start();
            $_SESSION['nombre_usr'] = $dU->nombre_usr;
            var_dump($datosUsuario);
            return $_SESSION;
        }

        # Si no funciona el inicio de sesion pero devuelve un objeto.
        else {
            var_dump($datosUsuario);
            die("Fallo al intentar iniciar session");
        }
    }
}
// Action Registro
if(isset($_GET['action']) && $_GET['action'] =='registrar' && !empty($_POST['UsuarioRE'] && $_POST['UsuarioRC'] && $_POST['UsuarioRCC'] && $_POST['terminosycondiciones'])){
    $usercontroler = new UserController();
    $usercontroler->AlistarInformacion($_POST['UsuarioRE'],$_POST['UsuarioRC'],$_POST['UsuarioRCC']);
    // Por Probar: consulta e inicia session en el registro
    return;
}

// Action registro fallido. Condicion contraria a la de arriba.
if (isset($_GET['action']) && $_GET['action'] =='registrar' && empty($_POST['UsuarioRE'] || $_POST['UsuarioRC'] || $_POST['UsuarioRCC'])) {
    die("Por favor rellene todos los campos de registro. ʕっ•ᴥ•ʔっ ♡");
}

// inicio de sesion.
if (isset($_GET['action']) && $_GET['action'] == 'session' && !empty($_POST['UsuarioIS']) && !empty($_POST['ContrasenaIS'])) {
    echo "holiwi";
    $usercontroler = new UserController();
    $usercontroler->VerificaInicio($_POST['UsuarioIS'],$_POST['ContrasenaIS']);
    $usercontroler->VistaUsuario();
    return;
}
//  inicio de session fallido
if (isset($_GET['action']) && $_GET['action'] =='session' && empty($_POST['UsuarioIS'] || $_POST['ContrasenaIS'])) {
    echo "Camopos no validos";
    return;
}

# Solucionado parcialmente, debido a que deberia iniciar sesion justo cuando se registra y NO enviarlo a otra pagina como hacemos aqui.
if (isset($_GET['action']) && $_GET['action'] == 'inicio') {
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
</body>