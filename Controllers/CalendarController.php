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

        public function prepareGetAllInfoEvent($id){
            $this->id_evn = $id;
            $objeto = $this->GetAllInfoEvents();
            echo $objeto;
        }

        public function prepareUpdate($id, $nombre, $des, $color, $desde, $hasta, $hinicio, $hfinal){
            $this->id_evn = $id;
            $this->nombre_evn = $nombre;
            $this->descripcion_evn = $des;
            $this->color_evn = $color;
            $this->desde_evn = $desde;
            $this->hasta_evn = $hasta;
            $this->hora_inicio_evn = $hinicio;
            $this->hora_final_evn = $hfinal;

            $this->UpdateEvent();
        }

        public function prepareDeleteEvent($id){
            $this->id_evn = $id;
            $this->deleteEvent();
            echo "Event Deleted";
        }
    }

    // ---------------------------------------------------------------------------------------------------------------

    if (isset($_GET['action']) && $_GET['action'] == 'Event') {
        $calendarcontroller = new CalendarController();
        if($_POST['id_evn'] == '' || $_POST['id_evn'] == NULL){
            $calendarcontroller->prepareEvent($_POST['nombre_evn'], $_POST['descripcion_evn'], $_POST['color_evn'], $_POST['desde_evn'], $_POST['hasta_evn'], $_POST['hora_inicio_evn'], $_POST['hora_final_evn'], $_SESSION['id_usr']);
            echo "event success";
            die();
        } else {
            $calendarcontroller->prepareUpdate($_POST['id_evn'], $_POST['nombre_evn'], $_POST['descripcion_evn'], $_POST['color_evn'], $_POST['desde_evn'], $_POST['hasta_evn'], $_POST['hora_inicio_evn'], $_POST['hora_final_evn']);
            echo "update success";
            die();
        }

    }
    
    if (isset($_GET['action']) && $_GET['action'] == 'GetEvents') {
        $calendarcontroller = new CalendarController();
        $calendarcontroller->prepareGetEvents();
    }

    if(isset($_GET['action']) && $_GET['action'] == 'GetAllEvents'){
        $calendarcontroller = new CalendarController();
        $calendarcontroller->prepareGetAllInfoEvent($_GET['id_evn']);
    }

    if (isset($_GET['action']) && $_GET['action'] == 'DeleteEvent') {
        $calendarcontroller = new CalendarController();
        $calendarcontroller->prepareDeleteEvent($_POST['id_evn']);
    }
?>