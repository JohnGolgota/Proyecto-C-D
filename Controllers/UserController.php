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
    public function VistaUsuario()
    {
        include '../Views/User/Index-user.php';
    }

    public function VistaDelete()
    {
        include '../Views/User/deleteUser.html';
    }

    public function VistaLogin()
    {
        include '../Views/User/login.php';
    }

    public function VistaUpdate()
    {
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

    public function verificarContrasena($old_password, $new_password, $confirm_password)
    {
        if (empty($old_password) || empty($new_password) || empty($confirm_password)) {
            die("Los campos NO pueden estar vacios");
        }

        if ($new_password != $confirm_password) {
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
        foreach ($datosUsuario as $dU) {
        }
        if (!password_verify($old_password, $dU->contrasena_usr)) {
            die("CONTRASEÑA INCORRECTA");
        }

        $contrasenaEncript = password_hash($new_password, PASSWORD_ARGON2ID);
        $this->contrasena_usr = $contrasenaEncript;

        // Tampoco se si va, pero bueno. xd
        // return;
    }

    public function verificarUpdate($nombre, $email, $contrasena){
        if(empty($contrasena)){
            echo "pass empty";
            die();
        }

        if(empty($email)){
            $email = $_SESSION['correo_usr'];
        }

        if(empty($nombre)){
            $nombre = $_SESSION['nombre_usr'];
        }
        $this->correo_usr = $email;
        // die($this->correo_usr);
        $comprobacion = $this->ComprobarCorreo();
        if ($comprobacion == "" || $comprobacion == $this->correo_usr) {
            $this->nombre_usr = $_SESSION['nombre_usr'];
            $datosUsuario = $this->ConsultarUsuario();

            # Recorremos el objeto que obtenemos en el model.
            foreach ($datosUsuario as $dU) {}
            if (!password_verify($contrasena,$dU->contrasena_usr)) {
                echo "pass error";
                die();
    
            }
            
            if (strlen($nombre) < 4) {
                echo "length";
                die();
            }   

            $this->PrepareUpdateUserById($nombre, $this->correo_usr, $_SESSION['id_usr']);
        } else {
            echo "exist";
            die();
        }

        return;
    }

    # Alistar informacion para registrarse
    public function AlistarInformacion($email,$contrasena,$cContrasena)
    {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            session_destroy();
            die("Correo no valido.");
        }
        $this->correo_usr = $email;
        $comprobacion = $this->ComprobarCorreo();
        if ($comprobacion != 1) {
            die("Correo en uso.");
        }

        if ($cContrasena !== $contrasena) {
            session_destroy();
            die("Las contrasenas no coinciden.");
        }

        # strlen Idenfifica Cuantos caracteres hay
        if (strlen($contrasena) < 4) {
            session_destroy();
            die('minimo 4 caracteres.');
        }
        if (strlen($contrasena) > 10) {
            session_destroy();
            die('maximo 10 caracteres.');
        }

        # preg_match Exige que la contraseña tenga al menos un caracter del diccionario especificado.
        if (!preg_match('`[a-z]`', $contrasena)) {
            session_destroy();
            die('una letra minuscula.');
        }
        if (!preg_match('`[0-9]`', $contrasena)) {
            session_destroy();
            die('un numero.');
        }

        # Si todo es correcto, hacer:
        $this->correo_usr = $email;
        $alias = explode("@", $email);
        $this->nombre_usr = $alias[0];
        $contrasenaEncript = password_hash($contrasena, PASSWORD_ARGON2ID);
        $this->contrasena_usr = $contrasenaEncript;
        // $_SESSION['id_usr'] = $this->id_usr;
        $this->RegistrarUsuario();

        $datosUsuario = $this->ConsultarUsuario();
        foreach ($datosUsuario as $dU) {}
        $_SESSION['nombre_usr'] = $this->nombre_usr;
        $_SESSION['correo_usr'] = $this->correo_usr;
        $_SESSION['id_usr'] = $dU->id_usr;


        // $_SESSION['nombre_usr'] = $dU->nombre_usr;
        // $_SESSION['correo_usr'] = $dU->correo_usr;

        // $this->IniciarSession();
        // $this->VistaUsuario();


        // $datosUsuario = $this->ConsultarUsuario($nombre);

        // session_start();
        // $_SESSION['nombre_usr'] = $dU->nombre_usr;
        return;
    }

    // Necesito actualizar el session... rezons
    public function IniciarSession($correo)
    {
        $this->correo_usr = $correo;
        $datosUsuario = $this->ConsultarUsuarioByEmail();
        // echo var_dump($datosUsuario);
        foreach ($datosUsuario as $dU) {}

        // session_start();
        $_SESSION['id_usr'] = $dU->id_usr;
        $_SESSION['nombre_usr'] = $dU->nombre_usr;
        $_SESSION['correo_usr'] = $dU->correo_usr;
        // echo var_dump($_SESSION);
        // var_dump($datosUsuario);
        // var_dump($_SESSION);
        // return $_SESSION;
        return;


        # Si no funciona el inicio de sesion pero devuelve un objeto.

    }

    # Verificamos la informacion de inicio de sesion.
    public function VerificaInicio($nombre, $contrasena)
    {
        $this->nombre_usr = $nombre;
        $this->contrasena_usr = $contrasena;
        $datosUsuario = $this->ConsultarUsuario();

        # Recorremos el objeto que obtenemos en el model.
        foreach ($datosUsuario as $dU) {
        }
        if (password_verify($contrasena, $dU->contrasena_usr)) {
            // session_start();
            $_SESSION['id_usr'] = $dU->id_usr;
            $_SESSION['nombre_usr'] = $dU->nombre_usr;
            $_SESSION['correo_usr'] = $dU->correo_usr;

            // var_dump($datosUsuario);
            // return $_SESSION;
            // $this->VistaUsuario();
            return;
        }

        # Si no funciona el inicio de sesion pero devuelve un objeto.
        else {
            session_destroy();
            die("not pass");
            // var_dump($datosUsuario);
            // return;
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
if (isset($_GET['action']) && $_GET['action'] == 'registrar' && !empty($_POST['UsuarioRE'] && $_POST['UsuarioRC'] && $_POST['UsuarioRCC'] && $_POST['terminosycondiciones'])) {
    $usercontroler = new UserController();
    echo "entre";
    $usercontroler->AlistarInformacion($_POST['UsuarioRE'], $_POST['UsuarioRC'], $_POST['UsuarioRCC']);
    // Por Probar: consulta e inicia session en el registro
    return;
}

// Action registro fallido. Condicion contraria a la de arriba.
if (isset($_POST['action']) && $_POST['action'] == 'registrar' && empty($_POST['UsuarioRE'] || $_POST['UsuarioRC'] || $_POST['UsuarioRCC'])) {
    die("Por favor rellene todos los campos de registro. ʕっ•ᴥ•ʔっ ♡");
}

// inicio de sesion.
if (isset($_POST['action']) && $_POST['action'] == 'session' && !empty($_POST['UsuarioIS']) && !empty($_POST['ContrasenaIS'])) {
    // echo "holiwi";
    $usercontroler = new UserController();
    $usercontroler->VerificaInicio($_POST['UsuarioIS'], $_POST['ContrasenaIS']);
    $usercontroler->VistaUsuario();
    $objetoPrueba = $usercontroler->TraerNombreUsuario();
    // var_dump($objetoPrueba);

    return;
}

//  inicio de session fallido
if (isset($_POST['action']) && $_POST['action'] == 'session' && empty($_POST['UsuarioIS'] || $_POST['ContraseaIS'])) {
    echo "Campos no validos";
    return;
}
# Ajax Succes
// if (isset($_GET['action']) && $_GET['action'] == 'inicio') {
//     $usercontroler = new UserController();
//     $usercontroler->VistaUsuario();
//     return;
// }
if (isset($_GET['action']) && $_GET['action'] == 'inicio-prueba') {


// Ajax verificacion [true]
if(isset($_GET['action']) && $_GET['action'] == 'ajax-session' && !empty($_POST['usuariois']) && !empty($_POST['contrasenais'])){
    $usercontroler = new UserController();
    $usercontroler->VerificaInicio($_POST['usuariois'],$_POST['contrasenais']);
    echo "success";
    // $usercontroler->VistaUsuario(); // esta es la redireccion.
    return;
} 

// Ajax verificacion [success]
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
    $usercontroler->PrepararIdDelete($_SESSION['id_usr']);
    $usercontroler->RedirigirNoUsuario();

    return;
}

# Redireccion a Actualizar Nombre.
if (isset($_GET['action']) && $_GET['action'] == 'update') {
    $usercontroler = new UserController();
    // session_start();

    $busquedaObjeto = $usercontroler->TraerNombreUsuario();
    foreach ($busquedaObjeto as $obj) {
    }

    // $usercontroler->VistaUpdate();
    return;
}

if (isset($_GET['action']) && $_GET['action'] == 'actualizar') {
    $usercontroler = new UserController();
    $usercontroler->verificarUpdate($_POST['nombre_usr'], $_POST['correo_usr'], $_POST['contrasena_usr']);
    echo "true";
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
if (isset($_GET['action']) && $_GET['action'] == 'ajax-registro' && empty($_POST['usuarioRE'] || $_POST['usuarioRC'] || $_POST['usuarioRCC'])) {
    session_start();
    $usercontroler = new UserController();
    die("empty inputs");
    return;
}
if (isset($_GET['action']) && $_GET['action'] == 'ajax-registro') {
    session_start();
    $usercontroler = new UserController();
    $usercontroler->AlistarInformacion($_POST['usuarioRE'], $_POST['usuarioRC'], $_POST['usuarioRCC']);
    echo "./Controllers/UserController.php?action=inicio&user=$_POST[usuarioRE]";
    // echo "success";
    return;
}
if (isset($_GET['action']) && $_GET['action'] == 'inicio' && isset($_GET['user'])) {
    session_start();
    $usercontroler = new UserController();
    $usercontroler->IniciarSession($_GET['user']);
    $usercontroler->VistaUsuario();
    return;
}
// Ajax verificacion [true]
if (isset($_GET['action']) && $_GET['action'] == 'ajax-session' && !empty($_POST['usuarioRE']) && !empty($_POST['usuarioRC'])) {
    $usercontroler = new UserController();
    // $usercontroler->VerificaInicioByEmail($_POST['usuarioRE'], $_POST['usuarioRC']);

    // echo "success";
    // $usercontroler->VistaUsuario(); // esta es la redireccion.
    return;
}
// Action vista predefinida
if(isset($_GET) || !isset($_GET) && $_GET['action'] != "actualizar"){
    $usercontroler = new UserController();
    session_destroy();
    $usercontroler->RedirigirNoUsuario();
    return;
}
?>
</body>
