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

        public function prepareGetTasks(){
            $this->id_usr = $_SESSION['id_usr'];
            $objeto = $this->GetTasksForId();
            echo $objeto;
        }

        public function prepareDeleteTask($id){
            $this->id_rec = $id;
            $this->DeleteTask();
        }

        public function prepareGetTask($id){
            $this->id_rec = $id;
            $objeto = $this->getTask();
            echo $objeto;
        }

        public function prepareUpdateTask($id, $nombre, $color, $notificacion,){
            $this->id_rec = $id;
            $this->nombre_rec = $nombre;
            $this->notificacion_rec = $notificacion;
            $this->color_rec = $color;

            $this->updateTask();
        }
    }

    // --------------------------------------------------------------------------------------------------------------- //

    if (isset($_GET['action']) && $_GET['action'] == 'GetTasks') {
        $taskcontroller = new TaskController();
        $taskcontroller->prepareGetTasks();
        // echo $objeto;
    }

    if (isset($_GET['action']) && $_GET['action'] == 'AddTask') {
        $taskcontroller = new TaskController();
        $taskcontroller->prepareTask($_POST['nombre_rec'], $_POST['notificacion_rec'], $_POST['color_rec'], $_SESSION['id_usr']);
    }   
    
    if (isset($_GET['action']) && $_GET['action'] == 'DeleteTask') {
        $taskcontroller = new TaskController();
        $taskcontroller->prepareDeleteTask($_POST['id_rec']);
    }

    if (isset($_GET['action']) && $_GET['action'] == 'GetTask') {
        $taskcontroller = new TaskController();
        $taskcontroller->prepareGetTask($_POST['id_rec']);
    }

    if (isset($_GET['action']) && $_GET['action'] == 'UpdateTask') {
        $taskcontroller = new TaskController();
        $taskcontroller->prepareUpdateTask($_POST['id_rec'], $_POST['nombre_rec'], $_POST['notificacion_rec'], $_POST['color_rec']);
        echo $_POST['id_rec'];
    }
?>