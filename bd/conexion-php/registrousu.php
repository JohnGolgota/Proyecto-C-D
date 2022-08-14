<head></head><body></body>
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
            $nombreUsuario;
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
    }
    
    $RegistroComit = new Registro();
    $conexion = new Conexion();
    $conexion->BdConnect();
    
    # Verificar si algun valor esta vacio o no.
    if(!empty($_POST['UsuarioRE']) && !empty($_POST['UsuarioRC']) && !empty($_POST['UsuarioRCC'])){
        if($_POST['UsuarioRC'] == $_POST['UsuarioRCC']){
            # Correo Electronico.
            $RegistroComit->email_usr = $_POST['UsuarioRE'];

            # Contraseña, Confirmar Contraseña.
            $RegistroComit->cifrarContrasena();
            $RegistroComit->AsignarNombre();

            $sentence = $conexion->stm->prepare($RegistroComit->RegistroSQL());
            $sentence->execute();
            
            header('location: ../../index-user.html');
        } else {
            echo 'la cagaste xd';
        }
    }
?>