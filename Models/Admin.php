<?php
    class Admin {
        protected $data;

        // protected $nombre_adm;
        // protected $color_arc;
        // protected $fecha_arc;
        // protected $notificaciones_rec;
        // protected $id_usr;

        public function Query(){
            include_once '../Config/conexiondb.php';
            $conexion = new Conexion();

            // $sql = "SELECT * FROM tbl_usuario FULL OUTER JOIN ON tbl_archivo FULL OUTER JOIN ON tbl_eventos FULL OUTER JOIN ON tbl_pomodoro FULL OUTER JOIN ON tbl_recordatorios";
            $sql = "SELECT * FROM tbl_usuario";
            $result = $conexion->stm->prepare($sql);
            $result->execute();

            $search = $result->fetchAll(PDO::FETCH_OBJ);
            $jsonstring = json_encode($search);      
            return $jsonstring;
        }
    }
?>