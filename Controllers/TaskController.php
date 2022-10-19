<?php
    session_start();    
    include_once '../Models/Task.php';
    class TaskController extends Task {

    }

    if (isset($_GET['action']) && $_GET['action'] == 'GetTasks') {
        $taskcontroller = new TaskController();
        // $this->id_usr = $_SESSION['id_usr'];
        $object = $taskcontroller->GetTasksForId();
        echo $object;
    }

    if (isset($_GET['action']) && $_GET['action'] == 'AddTask') {
        $taskcontroller = new TaskController();
        $_SESSION['nombre_rec'] = $_POST['nombre_rec'];
        $_SESSION['notificacion_rec'] = $_POST['notificacion_rec'];
        $_SESSION['color_rec'] = $_POST['color_rec'];
        $taskcontroller->addTask();
    }

    
?>