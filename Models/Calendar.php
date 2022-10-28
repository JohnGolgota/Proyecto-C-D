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

		// public function addEvent(){
		// include_once '../Config/conexiondb.php';
		// $conexion = new Conexion();
		
		// $sql = "INSERT INTO tbl_Recordatorios(Nombre_rec, Color_rec, Notificacion_rec, id_usr) VALUES(?, ?, ?, ?)";
		// $result = $conexion->stm->prepare($sql);

		// $result->bindParam(1,$this->nombre_rec);
		// $result->bindParam(2,$this->color_rec);
		// $result->bindParam(3,$this->notificacion_rec);
		// $result->bindParam(4,$this->id_usr);

		// $result->execute();
		// }
	}
?>