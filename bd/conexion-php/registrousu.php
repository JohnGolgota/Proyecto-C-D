<head></head><body><h1>Hola</h1></body>
<?php
    include 'conexiondb.php'; 

    # Clase: Registro. Tiene todos los parametros para iniciar sesion.
    class Registro {
        public $nombre_usr;
        public $email_usr;
        public $pass_usr;
        // public $confirmpass_usr;
        
        public function RegistroSQL(){
           $sql = "INSERT INTO tbl_usuario (nombre_usr, correo_usr, contrasena_usr) VALUES ('$this->nombre_usr', '$this->email_usr', '$this->pass_usr')";
           return $sql;
        }

        public function AsignarNombre(){
            $nombreUsuario = "";
            $linea = $this->email_usr;
            $nombreUsuario = explode("@",$linea);
            $this->nombre_usr = $nombreUsuario[0];
            return $this->nombre_usr;
        }

        public function cifrarContrasena(){
            # Ciframos las contraseñas. De esta manera cualquier persona que entre a la base de datos no podra verlas sin mas.
            $this->pass_usr = password_hash($_POST['UsuarioRC'], PASSWORD_BCRYPT);
            // echo $this->pass_usr . "<br>" . strlen($this->pass_usr);
        }
        public function ComprobarCorreo(){
            $email = "SELECT correo_usr FROM tbl_usuario WHERE correo_usr = '$this->email_usr'";
            return $email;
        }
    }
    
    $RegistroComit = new Registro();
    $conexion = new Conexion();
    $conexion->BdConnect();
    
    # Verificar si algun valor esta vacio o no.
    if(!empty($_POST['UsuarioRE']) && !empty($_POST['UsuarioRC']) && !empty($_POST['UsuarioRCC'])){
        if($_POST['UsuarioRC'] == $_POST['UsuarioRCC']){
            # Comprueba que el correo sea valido. en caso de retirarse el required del input
            if (!filter_var($_POST['UsuarioRE'], FILTER_VALIDATE_EMAIL)) {
                # el die es como un echo.
                die('El campo correo electronico esta vacio o no es un correo electronico valido.');
            }
            if (strlen($_POST['UsuarioRC']) < 4) {
                # Con strlen contamos los caracteres de una cadena.
                die('La contraseña debe tener al menos 4 caracteres.');
            }
            if (strlen($_POST['UsuarioRC']) > 10) {
                die('La contraseña no puede tener mas de 10 caracteres.');
            }
            if (!preg_match('`[a-z]`', $_POST['UsuarioRC'])) {
                # Norma de caracteres
                die('La contraseña debe tener al menos una letra minuscula.');
            }
            if (!preg_match('`[0-9]`', $_POST['UsuarioRC'])) {
                die('La contraseña debe tener al menos un numero.');
            }
            if ($_POST['UsuarioRC'] !== $_POST['UsuarioRCC']) {
                die('Las contraseñas no coinciden.');
            }

            # Correo Electronico.
            $RegistroComit->email_usr = $_POST['UsuarioRE'];

            # Contraseña, Confirmar Contraseña.
            $RegistroComit->cifrarContrasena();
            $RegistroComit->AsignarNombre();


            $sentence = $conexion->stm->prepare($RegistroComit->RegistroSQL());
            $sentence->execute();
            
        } else {
            echo 'la cagaste xd';
        }
    }

?>