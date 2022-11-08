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

            $sql = "CALL GetTasksForId('$this->id_usr')";
            $result = $conexion->stm->prepare($sql);
            $result->execute();

            $task = $result->fetchAll(PDO::FETCH_OBJ);
            $jsonstring = json_encode($task);      
            return $jsonstring;
        }

        public function addTask(){
            include_once '../Config/conexiondb.php';
            $conexion = new Conexion();

            $sql = "CALL AddTask(?, ?, ?, ?)";
            $result = $conexion->stm->prepare($sql);

            $result->bindParam(1,$this->nombre_rec);
            $result->bindParam(2,$this->color_rec);
            $result->bindParam(3,$this->notificacion_rec);
            $result->bindParam(4,$this->id_usr);

            $result->execute();
        }
        
        public function deleteTask(){
            include_once '../Config/conexiondb.php';
            $conexion = new Conexion();

            $sql = "CALL DeleteTask('$this->id_rec')";
            $result = $conexion->stm->prepare($sql);
            $result->execute();
        }

        public function getTask(){
            include_once '../Config/conexiondb.php';
            $conexion = new Conexion();

            $sql = "CALL GetTask('$this->id_rec')";
            $result = $conexion->stm->prepare($sql);
            $result->execute();

            $task = $result->fetchAll(PDO::FETCH_OBJ);
            $jsonstring = json_encode($task);      
            return $jsonstring;
        }

        public function updateTask(){
            include_once '../Config/conexiondb.php';
            $conexion = new Conexion();

            $sql = "CALL UpdateTask('$this->nombre_rec', '$this->color_rec', '$this->notificacion_rec', '$this->id_rec')";
            $result = $conexion->stm->prepare($sql);
            $result->execute();
        }
    }
?>