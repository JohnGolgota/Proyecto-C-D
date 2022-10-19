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
?>