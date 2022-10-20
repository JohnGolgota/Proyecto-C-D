<?php
    session_start();    
    include_once '../Models/Task.php';
    class TaskController extends Task {

        public function prepareTask($nombre, $notificacion, $color, $id){
            $this->nombre_rec = $nombre;
            $this->notificacion_rec = $notificacion;
            $this->color_rec = $color;
            $this->id_usr = $id;

            $this->addTask();
        }

        public function prepareGetTasks() {
            $this->id_usr = $_SESSION['id_usr'];
            $objeto = $this->GetTasksForId();
            echo $objeto;
        }
    }

    if (isset($_GET['action']) && $_GET['action'] == 'GetTasks') {
        $taskcontroller = new TaskController();
        $taskcontroller->prepareGetTasks();
        // echo $objeto;
    }

    if (isset($_GET['action']) && $_GET['action'] == 'AddTask') {
        $taskcontroller = new TaskController();
        $taskcontroller->prepareTask($_POST['nombre_rec'], $_POST['notificacion_rec'], $_POST['color_rec'], $_SESSION['id_usr']);
    }    
?>