<?php

class Conexion{
    public $stm;

    public function __construct(){
        try{
            // INTENTAR
            $this->stm = new PDO("mysql:host=localhost;dbname=carpe_diem", 'root', '');
            # DB:Servidor; dbname:nombre de la db;
        } catch(PDOException $error) {
            # En Caso De Error, guardar la informacion en la variable $error.
            echo "Error: ". $error->getMessage();
            $this->CrearBD();
        }
    }
    private function CrearBD()
    {
        $connect = new mysqli("localhost","root","");
        if ($connect->connect_error) {
            die("Error: " . $connect->connect_error . "<br>");
        }

        $sql = "CREATE DATABASE carpe_diem";
        if ($connect->query($sql) === TRUE) {
            echo "<br>Base de datos Creada Como un Virus<br>";
            $this->CrearTablas();
        }
        else {
            echo "Error: " . $connect->connect_error . "<br>";
        }

        $connect->close();
    }
    private function CrearTablas()
    {
        $tablas = [
            "CREATE TABLE tbl_usuario (id_usr int(11) NOT NULL AUTO_INCREMENT,nombre_usr varchar(30) NOT NULL,correo_usr varchar(50) NOT NULL UNIQUE,contrasena_usr varchar(255) NOT NULL,PRIMARY KEY (id_usr))",
            "CREATE TABLE tbl_administrador(id_adm int(11) NOT NULL AUTO_INCREMENT,nombre_adm varchar(100) NOT NULL,correo_adm varchar(50) NOT NULL,contacto_ext_adm varchar(150),contrasena_adm varchar(255) NOT NULL,PRIMARY KEY (id_adm))",
            "CREATE TABLE tbl_eventos (id_evn int(11) NOT NULL AUTO_INCREMENT,fechahora_evn datetime NOT NULL DEFAULT current_timestamp(), nombre_evn varchar(50) NOT NULL, descripcion_evn varchar(255),color_evn varchar(8),notificaciones_evn varchar(2) NOT NULL,prioridad_evn varchar(12) NOT NULL,id_usr int(11) NOT NULL,PRIMARY KEY (id_evn),FOREIGN KEY (id_usr) REFERENCES tbl_usuario(id_usr))",
            "CREATE TABLE tbl_comunicado_user(id_rpu int(11) NOT NULL AUTO_INCREMENT,asunto_rpu varchar(50) NOT NULL,descripcion_rpu text NOT NULL,fecha_rpu datetime NOT NULL,estado_rpu varchar(10) NOT NULL,respuesta_rpu varchar(100),id_adm int(11),id_usr int(11) NOT NULL,PRIMARY KEY (id_rpu),FOREIGN KEY (id_adm) REFERENCES tbl_administrador(id_adm),FOREIGN KEY (id_usr) REFERENCES tbl_usuario(id_usr))",
            "CREATE TABLE tbl_metodo_pago(id_mpg int(11) NOT NULL AUTO_INCREMENT,tipo_mpg varchar(30) NOT NULL,numero_mpg varchar(19) NOT NULL,fecha_caducidad_mpg date NOT NULL,codigo_cvv_mpg varchar(3) NOT NULL,nombres_mpg varchar(30) NOT NULL,apellidos_mpg varchar(50) NOT NULL,pais_mpg varchar(100) NOT NULL,codigo_postal_mpg varchar(10) NOT NULL,direccion_mpg varchar(100) NOT NULL,id_usr int(11) NOT NULL,PRIMARY KEY (id_mpg),FOREIGN KEY (id_usr) REFERENCES tbl_usuario(id_usr))",
            "CREATE TABLE tbl_pagos(id_pg int(11) NOT NULL AUTO_INCREMENT,descripcion_pg varchar(255),cantidad_pg float NOT NULL,impuestos_pg float NOT NULL,id_mpg int(11) NOT NULL,PRIMARY KEY (id_pg),FOREIGN KEY (id_mpg) REFERENCES tbl_metodo_pago(id_mpg))",
            "CREATE TABLE tbl_pomodoro(id_pmd int(11) NOT NULL AUTO_INCREMENT,fecha_hora_pmd datetime,nombre_pmd varchar(30) NOT NULL,actividad_pmd varchar(8),pausa_corta_pmd varchar(8) NOT NULL,pausa_larga_pmd varchar(8) NOT NULL,id_usr int(11) NOT NULL,PRIMARY KEY (id_pmd),FOREIGN KEY (id_usr) REFERENCES tbl_usuario (id_usr))",
            "CREATE TABLE tbl_Recordatorios(id_rec int(11) AUTO_INCREMENT,Nombre_rec varchar(75),Color_rec varchar(8),Fecha_rec TIMESTAMP DEFAULT CURRENT_TIMESTAMP,Notificacion_rec DATETIME,id_usr int(11),PRIMARY KEY(id_rec),FOREIGN KEY(id_usr) REFERENCES tbl_usuario(id_usr))",
        ];
        try {
            $this->stm = new PDO("mysql:host=localhost;dbname=carpe_diem", 'root', '');
            foreach ($tablas as $tabla){
                $crearTabla = $this->stm->prepare($tabla);
                $crearTabla->execute();
            }
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
}

// Instanciamos un nuevo objeto para verificar si la conexion es correcta.
// $conexion = new Conexion();
// $conexion->BdConnect();

?>