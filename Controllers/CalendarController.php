<?php 
    session_start();    
    include_once '../Models/Calendar.php';
    class CalendarController extends Calendar {
        public function prepareEvent($nombre, $des, $color, $desde, $hasta, $hinicio, $hfinal,  $id){
            $this->nombre_evn = $nombre;
            $this->descripcion_evn = $des;
            $this->color_evn = $color;
            $this->desde_evn = $desde;
            $this->hasta_evn = $hasta;
            $this->hora_inicio_evn = $hinicio;
            $this->hora_final_evn = $hfinal;
            $this->id_usr = $id;

            $this->addEvent();
        }
    }

    // CONDICIONES
    if (isset($_GET['action']) && $_GET['action'] == 'AddEvent') {
        $calendarcontroller = new CalendarController();
        $calendarcontroller->prepareEvent($_POST['nombre_evn'], $_POST['descripcion_evn'], $_POST['color_evn'], $_POST['start'], $_POST['end'], $_POST['time'], $_POST['timeend'], $_SESSION['id_usr']);
        // echo $_POST;
    }   

?>