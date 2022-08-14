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
           $sql = "INSERT INTO tbl_usuario (nombre_usr, email_usr, contrasena_usr) VALUES ('$this->nombre_usr', '$this->email_usr', '$this->pass_usr')";
           return $sql;
        }

        public function AsignarNombre(){
            $linea = $this->email_usr;
            $this->nombre_usr = explode("@",$linea);
            // return $this->nombre_usr[0];
            // echo $this->nombre_usr[0];
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
            $RegistroComit->email_usr = $_POST['UsuarioRE'];
            // $RegistroComit->pass_usr = $_POST['UsuarioRC'];
            $RegistroComit->cifrarContrasena();
            // $RegistroComit->confirmpass_usr = $_POST['UsuarioRCC'];
            $RegistroComit->AsignarNombre();

            $conexion->stm->prepare($RegistroComit->RegistroSQL());
            $conexion->stm->execute();
            
        } else {
            echo 'la cagaste xd';
        }
    }
    
    
?>