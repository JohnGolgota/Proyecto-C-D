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

            $sql = "SELECT * FROM tbl_Recordatorios WHERE id_usr = '$_SESSION[id_usr]'";
            $result = $conexion->stm->prepare($sql);
            $result->execute();

            // echo "Hice una consulta";

            // $a = $result->fetchAll(PDO::FETCH_OBJ);
            $task = $result->fetchAll(PDO::FETCH_OBJ);
            // var_dump($task);

            // foreach ($task as $row) {}

            $jsonstring = json_encode($task);
            // echo "Llegue Al String :D " . $jsonstring;

            // $json[] = array(
            //     'id_rec' => $row->id_rec,
            //     'nombre_rec' => $row->nombre_rec,
            //     'color_rec' => $row->color_rec,
            //     'notificacion_rec' => $row->notificacion_rec
            // );

            // echo $row->id_rec;
            
            echo $jsonstring;
        }
    }
?>