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

        public function prepareGetEvents(){
            $this->id_usr = $_SESSION['id_usr'];
            $objeto = $this->GetEventsForId();
            echo $objeto;
        }
    }

    // CONDICIONES
    if (isset($_GET['action']) && $_GET['action'] == 'AddEvent') {
        $calendarcontroller = new CalendarController();
        $calendarcontroller->prepareEvent($_POST['nombre_evn'], $_POST['descripcion_evn'], $_POST['color_evn'], $_POST['desde_evn'], $_POST['hasta_evn'], $_POST['hora_inicio_evn'], $_POST['hora_final_evn'], $_SESSION['id_usr']);
        echo "event success";
    }  
    
    if (isset($_GET['action']) && $_GET['action'] == 'GetEvents') {
        $calendarcontroller = new CalendarController();
        $calendarcontroller->prepareGetEvents();
    }

?>