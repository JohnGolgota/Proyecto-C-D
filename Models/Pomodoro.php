<?php
    class Pomodoro {
        protected $id_pmd;
        protected $fecha_hora_pmd;
        protected $evento_pmd;
        protected $actividad_pmd;
        protected $pausa_corta_pmd;
        protected $pausa_larga_pmd;
        protected $id_usr;

        public function addPomodoro(){
            include_once '../Config/conexiondb.php';
            $conexion = new Conexion();

            $sql = "INSERT INTO tbl_pomodoro(evento_pmd, actividad_pmd, pausa_corta_pmd, pausa_larga_pmd, id_usr) VALUES(?, ?, ?, ?, ?)";
            $result = $conexion->stm->prepare($sql);

            $result->bindParam(1,$this->evento_pmd);
            $result->bindParam(2,$this->actividad_pmd);
            $result->bindParam(3,$this->pausa_corta_pmd);
            $result->bindParam(4,$this->pausa_larga_pmd);
            $result->bindParam(5,$this->id_usr);

            $result->execute();
        }

    }
?>