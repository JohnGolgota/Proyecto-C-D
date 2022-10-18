<?php
    include_once '../Models/Task.php';
    class TaskController extends Task {

    }

    

    
    if (isset($_GET['action']) && $_GET['action'] == 'GetTasks') {
        // echo $_GET['hola'];
        $taskcontroller = new TaskController();
        $object = $taskcontroller->GetTasksForId();
        echo $object;
    }
?>