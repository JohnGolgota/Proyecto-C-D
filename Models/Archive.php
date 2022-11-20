<?php
    class Archive {
        protected $id_arc;
        protected $nombre_arc;
        protected $color_arc;
        protected $fecha_arc;
        // protected $fecha_del_arc;
        protected $notificaciones_rec;
        protected $id_usr;

        public function GetArchivesForId(){
            include_once '../Config/conexiondb.php';
            $conexion = new Conexion();

            $sql = "CALL GetArchivesForId('$this->id_usr')";
            $result = $conexion->stm->prepare($sql);
            $result->execute();

            $task = $result->fetchAll(PDO::FETCH_OBJ);
            $jsonstring = json_encode($task);      
            return $jsonstring;
        }
    }
?>