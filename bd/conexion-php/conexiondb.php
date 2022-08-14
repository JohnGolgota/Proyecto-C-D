<?php

    class Conexion{
        public $stm;

        public function BdConnect(){
            try{
                // INTENTAR
                $this->stm = new PDO("mysql:host=localhost;dbname=base_datos_cd", 'root', '');
                                    # DB:Servidor; dbname:nombre de la db;
            } catch(PDOException $error) {
                    # En Caso De Error, guardar la informacion en la variable $error.
                echo "Error: ". $error->getMessage();
            }
        }
    }

    // Instanciamos un nuevo objeto para verificar si la conexion es correcta.
    // $conexion = new Conexion();
    // $conexion->BdConnect();

?>