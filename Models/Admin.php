<?php
    class Admin {
        protected $data;

        public function Query(){
            include_once '../Config/conexiondb.php';
            $conexion = new Conexion();

            $sql = "SELECT id_usr, nombre_usr, correo_usr FROM tbl_usuario WHERE id_usr LIKE '%$this->data%' or nombre_usr LIKE '%$this->data%' or correo_usr LIKE '%$this->data%'";
            $result = $conexion->stm->prepare($sql);
            $result->execute();

            $search = $result->fetchAll(PDO::FETCH_OBJ);
            $jsonstring = json_encode($search);      
            return $jsonstring;
        }

        public function Events(){
            include_once '../Config/conexiondb.php';
            $conexion = new Conexion();

            $sql = "SELECT id_evn, nombre_evn, descripcion_evn, fecha_evn, id_usr FROM tbl_eventos WHERE id_evn LIKE '%$this->data%' or nombre_evn LIKE '%$this->data%' or descripcion_evn LIKE '%$this->data%' or id_usr LIKE '%$this->data%'";
            $result = $conexion->stm->prepare($sql);
            $result->execute();

            $search = $result->fetchAll(PDO::FETCH_OBJ);
            $jsonstring = json_encode($search);      
            return $jsonstring;
        }

        public function Tasks(){
            include_once '../Config/conexiondb.php';
            $conexion = new Conexion();

            $sql = "SELECT id_rec, nombre_rec, id_usr FROM tbl_recordatorios WHERE id_rec LIKE '%$this->data%' or nombre_rec LIKE '%$this->data%' or id_usr LIKE '%$this->data%'";
            $result = $conexion->stm->prepare($sql);
            $result->execute();

            $search = $result->fetchAll(PDO::FETCH_OBJ);
            $jsonstring = json_encode($search);      
            return $jsonstring;
        }

        public function Archives(){
            include_once '../Config/conexiondb.php';
            $conexion = new Conexion();

            $sql = "SELECT id_arc, nombre_arc, id_usr FROM tbl_archivo WHERE id_arc LIKE '%$this->data%' or nombre_arc LIKE '%$this->data%' or id_usr LIKE '%$this->data%'";
            $result = $conexion->stm->prepare($sql);
            $result->execute();

            $search = $result->fetchAll(PDO::FETCH_OBJ);
            $jsonstring = json_encode($search);      
            return $jsonstring;
        }

        public function Pomodoros(){
            include_once '../Config/conexiondb.php';
            $conexion = new Conexion();

            $sql = "SELECT id_pmd, evento_pmd, id_usr FROM tbl_pomodoro WHERE id_pmd LIKE '%$this->data%' or evento_pmd LIKE '%$this->data%' or id_usr LIKE '%$this->data%'";
            $result = $conexion->stm->prepare($sql);
            $result->execute();

            $search = $result->fetchAll(PDO::FETCH_OBJ);
            $jsonstring = json_encode($search);      
            return $jsonstring;
        }
    }
?>