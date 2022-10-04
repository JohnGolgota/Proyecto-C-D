<?php

class Conexion
{
    private $servername = "localhost";
    private $username = "root";
    private $password = "";

    public $stm;
    public function __construct()
    {
        try {
            $this->stm = new PDO("mysql:host=localhost;dbname=colection", 'root', '');
        } catch (PDOException $error) {
            echo "Error: " . $error->getMessage() . "<br>";
            $this->CrearBD();
        }
    }
    public function CrearBD()
    {
        $servername = "localhost";
        $username = "root";
        $password = "";

        // Create connection
        $connect = new mysqli($servername, $username, $password);
        // Check connection
        if ($connect->connect_error) {
            die("Connection failed: " . $connect->connect_error . "<br>");
        }

        // Create database
        $sql = "CREATE DATABASE colection";
        if ($connect->query($sql) === TRUE) {
            echo "Database created successfully<br>";
            $this->CrearTables();
        } else {
            echo "Error creating database: " . $connect->error . "<br>";
        }

        $connect->close();
    }
    public function CrearTables()
    {
        $tables = [
            "CREATE TABLE tbl_autor(id_au int not null PRIMARY KEY AUTO_INCREMENT,nombre_au varchar(255) not null,seudonimo_au varchar(255),nacio_au varchar(255),fnacio_au date,ocupacion_au varchar(100),lenguao_au varchar(100),nobras int NOT null DEfAULT 0)",
            "CREATE TABLE tbl_libros(id_li int not null PRIMARY KEY AUTO_INCREMENT,titulo_li varchar(255) not null,tituloor_li varchar(255),serie_li varchar(255),orderse_li float,arte_li text,artista_li varchar(255),fpublic_li date NOT null,npag_li int not null,estado_li varchar(10),com_li varchar(50),fcom_li date,id_au int)",
            "CREATE TABLE tbl_genero(id_ge int not null PRIMARY KEY AUTO_INCREMENT,nombre_ge varchar(50),descripcion_ge varchar(255))",
            "CREATE TABLE tbl_usuarios(id_usr int AUTO_INCREMENT,nombre_usr varchar(100) NOT null,correo_usr varchar(255) not null,contrasena_usr varchar(255) NOT NULL,PRIMARY KEY(id_usr))",
            "CREATE TABLE tbl_genero_libro(id_ge int,id_li int,FOREIGN KEY (id_ge) REFERENCES tbl_genero(id_ge),FOREIGN KEY (id_li) REFERENCES tbl_libros(id_li))"
        ];
        try {
            $this->stm = new PDO("mysql:host=localhost;dbname=colection", 'root', '');
            foreach ($tables as $table) {
                echo $table . "<br><br>";
                
                $createTable = $this->stm->prepare($table);
                $createTable->execute();
            }
        } catch (PDOException $error) {
            echo "Error: " . $error->getMessage();
            $this->CrearBD();
        }
    }
}
