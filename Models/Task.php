<?php
    class Task {
        protected $id_rec;
        protected $nombre_rec;
        protected $color_rec;
        protected $notificaciones_rec;
        protected $id_usr;

        public function GetTasksForId(){
            include_once '../Config/conexiondb.php';
            $conexion = new Conexion();

            $sql = "SELECT * FROM tbl_Recordatorios WHERE id_usr = '$this->id_usr'";
            $result = $conexion->stm->prepare($sql);
            $result->execute();

            foreach ($result as $row) {}
                
            $array = array(
                'id_rec' => $row->id_rec,
                'nombre_rec' => $row->nombre_rec,
                'color_rec' => $row->color_rec,
                'notificacion_rec' => $row->notificacion_rec
            );
            
            $jsonstring = json_encode($json);
            return $jsonstring;
        }
    }



?>