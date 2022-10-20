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

            $sql = "SELECT * FROM tbl_Recordatorios WHERE id_usr = '$this->id_usr' ORDER BY id_rec DESC";
            $result = $conexion->stm->prepare($sql);
            $result->execute();

            $task = $result->fetchAll(PDO::FETCH_OBJ);
            $jsonstring = json_encode($task);      
            return $jsonstring;
        }

        public function addTask(){
            include_once '../Config/conexiondb.php';
            $conexion = new Conexion();

            $sql = "INSERT INTO tbl_Recordatorios(Nombre_rec, Color_rec, Notificacion_rec, id_usr) VALUES(?, ?, ?, ?)";
            $result = $conexion->stm->prepare($sql);

            $result->bindParam(1,$this->nombre_rec);
            $result->bindParam(2,$this->color_rec);
            $result->bindParam(3,$this->notificacion_rec);
            $result->bindParam(4,$this->id_usr);

            $result->execute();
        }
    }
?>