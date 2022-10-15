<head>
    <!-- Un problema a Arreglar -->
    <link rel="shortcut icon" href="../Public/Img/favicon.png" type="image/x-icon">
</head>
<body>
<?php
session_start();

// ini_set('display_errors', 0);
// ini_set('display_status_errors', 0);
// error_reporting(-1);

// if(session_destroy()){
//     die ("putos");
// }

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
    
    public function VistaDelete(){
        include '../Views/User/deleteUser.html';
    }

    public function VistaLogin()
    {
        include '../Views/User/login.php';
    }
    
    public function VistaUpdate(){
        include '../Views/User/updateUser.php';
    }
    public function RedirigirNoSesion()
    {
        header("location: ../");
    }

    public function RedirigirNoUsuario()
    {
        // Sale
        header("location: ../");
    }

    public function verificarContrasena($old_password, $new_password, $confirm_password){
        if(empty($old_password) || empty($new_password) || empty($confirm_password)){
            die("Los campos NO pueden estar vacios");
        }

        if($new_password != $confirm_password){
            die("Las Contraseñas NO Coinciden");
        }

        # strlen Idenfifica Cuantos caracteres hay
        if (strlen($new_password) < 4) {
            die('La contraseña debe tener al menos 4 caracteres.');
        }
        if (strlen($new_password) > 10) {

            die('La contraseña no puede tener mas de 10 caracteres.');
        }

        # preg_match Exige que la contraseña tenga al menos un caracter del diccionario especificado.
        if (!preg_match('`[a-z]`', $new_password)) {
            die('La contraseña debe tener al menos una letra minuscula.');
        }
        if (!preg_match('`[0-9]`', $new_password)) {
            die('La contraseña debe tener al menos un numero.');
        }

        $datosUsuario = $this->ConsultarUsuario($_SESSION['nombre_usr']);

        # Recorremos el objeto que obtenemos en el model.
        foreach ($datosUsuario as $dU) {}
        if (!password_verify($old_password,$dU->contrasena_usr)) {
            die("CONTRASEÑA INCORRECTA");
        } 

        $contrasenaEncript = password_hash($new_password,PASSWORD_ARGON2ID);
        $this->contrasena_usr = $contrasenaEncript;

        // Tampoco se si va, pero bueno. xd
        // return;
    }

    public function verificarUpdate($nombre, $email, $contrasena){
        if(empty($nombre) || empty($email) || empty($contrasena)){
            die("Los campos NO pueden estar vacios");
        }

        // COMPROBACION DE CORREO ELECTRONICO
        $this->correo_usr = $email;
        $comprobacion = $this->ComprobarCorreo();
        if ($comprobacion != "") {
            die("Ya existe una cuenta con este correo/nombre de usuario.");
        }

        $this->nombre_usr = $_SESSION['nombre_usr'];
        $datosUsuario = $this->ConsultarUsuario();
        # Recorremos el objeto que obtenemos en el model.
        foreach ($datosUsuario as $dU) {}
        if (!password_verify($contrasena,$dU->contrasena_usr)) {
            die("Contraseña Incorrecta");
        }

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
            die("Introduzca una dirección de correo electronico valido");
        }

        if (strlen($nombre) < 6) {
            die('El nombre de usuario debe tener al menos 6 caracteres.');
        }   

        // NO se si va, pero lo pongo.
        return;
    }

    # Alistar informacion para registrarse
    function AlistarInformacion($email,$contrasena,$cContrasena)
    {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            # Return + echo = die
            echo "<script>alert('Email not valid');</script>";
            die("Introduzca una dirección de correo electronico valido");
        }

        # Si retorna un elemento en vez de nada, entonces rompe.
        $comprobacion = $this->ComprobarCorreo($email);
        if ($comprobacion != "") {
            session_destroy();
            die("Ya existe una cuenta con este correo");
        }
        
        if ($cContrasena !== $contrasena) {
            session_destroy();
            die("Las Contraseñas no coinciden");
        }

        # strlen Idenfifica Cuantos caracteres hay
        if (strlen($_POST['UsuarioRC']) < 4) {
            session_destroy();
            die('La contraseña debe tener al menos 4 caracteres.');
        }
        if (strlen($_POST['UsuarioRC']) > 10) {
            session_destroy();
            die('La contraseña no puede tener mas de 10 caracteres.');
        }

        # preg_match Exige que la contraseña tenga al menos un caracter del diccionario especificado.
        if (!preg_match('`[a-z]`', $_POST['UsuarioRC'])) {
            session_destroy();
            die('La contraseña debe tener al menos una letra minuscula.');
        }
        if (!preg_match('`[0-9]`', $_POST['UsuarioRC'])) {
            session_destroy();
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

        
        // $datosUsuario = $this->ConsultarUsuario($nombre);

        // session_start();
        // $_SESSION['nombre_usr'] = $dU->nombre_usr;

        return;
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
            // session_start();
            $_SESSION['id_usr'] = $dU->id_usr;
            $_SESSION['nombre_usr'] = $dU->nombre_usr;
            $_SESSION['correo_usr'] = $dU->correo_usr;

            // var_dump($datosUsuario);
            return $_SESSION;
        }

        # Si no funciona el inicio de sesion pero devuelve un objeto.
        else {
            // var_dump($datosUsuario);
            session_destroy();
            die("Fallo al intentar iniciar session");
        }
    }
    public function PrepararIdDelete($id_usr)
    {
        $this->id_usr = $_SESSION['id_usr'];
        $this->EliminarUsuario();
    }
    public function TraerNombreUsuario()
    {
        $this->id_usr = $_SESSION['id_usr'];
        $objetoPrueba = $this->GetUserById();
        return $objetoPrueba;
    }
    public function PrepareUpdateUserById($nombre_usr,$correo_usr,$id_usr)
    {
        $this->nombre_usr = $nombre_usr;
        $this->correo_usr = $correo_usr;
        $this->id_usr = $id_usr;
        $this->updateNombreUsuario();
    }
    public function PrepareIdForUpdate()
    {
        $this->id_usr = $_SESSION['id_usr'];
        $this->updateContrasena();
    }
}
// Action Registro
if(isset($_POST['action']) && $_POST['action'] =='registrar' && !empty($_POST['UsuarioRE'] && $_POST['UsuarioRC'] && $_POST['UsuarioRCC'] && $_POST['terminosycondiciones'])){
    $usercontroler = new UserController();
    $usercontroler->AlistarInformacion($_POST['UsuarioRE'],$_POST['UsuarioRC'],$_POST['UsuarioRCC']);
    // Por Probar: consulta e inicia session en el registro
    return;
}

// Action registro fallido. Condicion contraria a la de arriba.
if (isset($_POST['action']) && $_POST['action'] =='registrar' && empty($_POST['UsuarioRE'] || $_POST['UsuarioRC'] || $_POST['UsuarioRCC'])) {
    die("Por favor rellene todos los campos de registro. ʕっ•ᴥ•ʔっ ♡");
}

// inicio de sesion.
if (isset($_POST['action']) && $_POST['action'] == 'session' && !empty($_POST['UsuarioIS']) && !empty($_POST['ContrasenaIS'])) {
    // echo "holiwi";
    $usercontroler = new UserController();
    $usercontroler->VerificaInicio($_POST['UsuarioIS'],$_POST['ContrasenaIS']);
    $usercontroler->VistaUsuario();
    $objetoPrueba = $usercontroler->TraerNombreUsuario();
    // var_dump($objetoPrueba);
    
    return;
}
//  inicio de session fallido
if (isset($_POST['action']) && $_POST['action'] == 'session' && empty($_POST['UsuarioIS'] || $_POST['ContrasenaIS'])) {
    echo "Campos no validos";
    return;
}

if (isset($_GET['action']) && $_GET['action'] == 'inicio') {
    $usercontroler = new UserController();
    $usercontroler->VistaUsuario();
    return;
}

# Redireccion a Eliminar Cuenta
if (isset($_GET['action']) && $_GET['action'] == 'delete') {
    $usercontroler = new UserController();
    $usercontroler->VistaDelete();
    return;
}

# Confirmar Eliminar Cuenta
if (isset($_GET['action']) && $_GET['action'] == 'confirm_delete') {
    $usercontroler = new UserController();

    // session_start();
    // $_SESSION['id_usr'];
    
    # Accedemos a la funcion de "Eliminar Usuario".
    // $usercontroler->EliminarUsuario();
    $usercontroler->PrepararIdDelete($_SESSION['id_usr']);
    $usercontroler->VistaIndex();

    return;
}

# Redireccion a Actualizar Nombre.
if (isset($_GET['action']) && $_GET['action'] == 'update') {
    $usercontroler = new UserController();
    // session_start();

    $busquedaObjeto = $usercontroler->TraerNombreUsuario();
    foreach ($busquedaObjeto as $obj) {}

    // $usercontroler->VistaUpdate();
    return;
}

if (isset($_POST['action']) && $_POST['action'] == 'actualizar') {
    $usercontroler = new UserController();
    // session_start();
    $usercontroler->verificarUpdate($_POST['nombre_usr'], $_POST['correo_usr'], $_POST['contrasena_usr']);
    // $usercontroler->updateNombreUsuario($_POST['nombre_usr'], $_POST['correo_usr']);
    $usercontroler->PrepareUpdateUserById($_POST['nombre_usr'], $_POST['correo_usr'],$_SESSION['id_usr']);
    $usercontroler->VistaUsuario();

    // $usercontroler->VistaUpdate();
    return;
}

if (isset($_POST['action']) && $_POST['action'] == 'act_contrasena') {
    $usercontroler = new UserController();
    // session_start();
    $usercontroler->verificarContrasena($_POST['old_password_usr'], $_POST['new_password_usr'], $_POST['confirm_password_usr']);
    $usercontroler->PrepareIdForUpdate();
    $usercontroler->VistaUsuario();

    // $usercontroler->VistaUpdate();
    return;
}

# Cerrar Sesion.
if (isset($_GET['action']) && $_GET['action'] == 'abort') {
    $usercontroler = new UserController();
    session_destroy();
    $usercontroler->RedirigirNoUsuario();
    return;
}

// Action vista predefinida
if(isset($_GET) || !isset($_GET)){
    $usercontroler = new UserController();
    session_destroy();
    $usercontroler->RedirigirNoUsuario();
    return;
}

?>
</body>