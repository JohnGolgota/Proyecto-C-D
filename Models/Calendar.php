<?php
	class Calendar {
		protected $id_evn;
		protected $nombre_evn;
		protected $descripcion_evn;
		protected $color_evn;
		protected $desde_evn;
		protected $hasta_evn;

		protected $hora_inicio_evn;
		protected $hora_final_evn;

		protected $fecha_evn;
		protected $id_usr;

		public function addEvent(){
			include_once '../Config/conexiondb.php';
			$conexion = new Conexion();
			
			$sql = "INSERT INTO tbl_eventos(Nombre_evn, Descripcion_evn, Color_evn, Desde_evn, Hasta_evn, Hora_Inicio_evn, Hora_Final_evn, id_usr) VALUES(?, ?, ?, ?, ?, ?, ?, ?)";
			$result = $conexion->stm->prepare($sql);

			$result->bindParam(1,$this->nombre_evn);
			$result->bindParam(2,$this->descripcion_evn);
			$result->bindParam(3,$this->color_evn);
			$result->bindParam(4,$this->desde_evn);
			$result->bindParam(5,$this->hasta_evn);
			$result->bindParam(6,$this->hora_inicio_evn);
			$result->bindParam(7,$this->hora_final_evn);
			$result->bindParam(8,$this->id_usr);

			$result->execute();
		}

		public function GetEventsForId(){
            include_once '../Config/conexiondb.php';
            $conexion = new Conexion();

            $sql = "SELECT id_evn AS id, nombre_evn AS title, desde_evn AS start, color_evn AS color FROM tbl_eventos WHERE id_usr = '$this->id_usr'";
            $result = $conexion->stm->prepare($sql);
            $result->execute();

            $event = $result->fetchAll(PDO::FETCH_OBJ);
            $jsonstring = json_encode($event, JSON_UNESCAPED_UNICODE);      
            return $jsonstring;
        }

		public function GetAllInfoEvents(){
			include_once '../Config/conexiondb.php';
            $conexion = new Conexion();

            $sql = "SELECT * FROM tbl_eventos WHERE id_evn = '$this->id_evn'";
            $result = $conexion->stm->prepare($sql);
            $result->execute();

            $event = $result->fetchAll(PDO::FETCH_OBJ);
            $jsonstring = json_encode($event);      
            return $jsonstring;
        }

		public function UpdateEvent(){
			include_once '../Config/conexiondb.php';
			$conexion = new Conexion();
			
			$sql = "UPDATE tbl_eventos SET nombre_evn = ?, descripcion_evn = ?, color_evn = ?, desde_evn = ?, hasta_evn = ?, hora_inicio_evn = ?, hora_final_evn = ? WHERE id_evn = ?";
			$result = $conexion->stm->prepare($sql);

			$result->bindParam(1,$this->nombre_evn);
			$result->bindParam(2,$this->descripcion_evn);
			$result->bindParam(3,$this->color_evn);
			$result->bindParam(4,$this->desde_evn);
			$result->bindParam(5,$this->hasta_evn);
			$result->bindParam(6,$this->hora_inicio_evn);
			$result->bindParam(7,$this->hora_final_evn);
			$result->bindParam(8,$this->id_evn);

			$result->execute();
		}

		public function deleteEvent(){
            include_once '../Config/conexiondb.php';
            $conexion = new Conexion();

            $sql = "DELETE FROM tbl_eventos WHERE id_evn = '$this->id_evn'";
            $result = $conexion->stm->prepare($sql);
            $result->execute();
        }

		public function DropEvent(){
			include_once '../Config/conexiondb.php';
            $conexion = new Conexion();

            $sql = "UPDATE tbl_eventos SET desde_evn = ? WHERE id_evn = ?";
            $result = $conexion->stm->prepare($sql);

			$result->bindParam(1,$this->desde_evn);
			$result->bindParam(2,$this->id_evn);
			
            $result->execute();
		}
	}
?>