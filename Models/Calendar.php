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
	}
?>