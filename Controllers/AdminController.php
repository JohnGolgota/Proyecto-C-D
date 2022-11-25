<?php
    session_start();    
    include_once '../Models/Admin.php';
    class AdminController extends Admin {

        public function prepareQuery($search){
            $this->data = $search;
            $objeto = $this->Query();
            echo $objeto;
        }

        public function prepareEvents($search){
            $this->data = $search;
            $events = $this->Events();
            echo $events;
        }

        public function prepareTasks($search){
            $this->data = $search;
            $tasks = $this->Tasks();
            echo $tasks;
        }

        public function prepareArchives($search){
            $this->data = $search;
            $archives = $this->Archives();
            echo $archives;
        }

        public function preparePomodoros($search){
            $this->data = $search;
            $pomodoros = $this->Pomodoros();
            echo $pomodoros;
        }
    }

    // --------------------------------------------------------------------------------------------------------------- //

    if (isset($_GET['action']) && $_GET['action'] == 'Query') {
        $admincontroller = new AdminController();
        $admincontroller->prepareQuery($_POST['search']);
    }

    if (isset($_GET['action']) && $_GET['action'] == 'Events') {
        $admincontroller = new AdminController();
        $admincontroller->prepareEvents($_POST['search']);
    }

    if (isset($_GET['action']) && $_GET['action'] == 'Tasks') {
        $admincontroller = new AdminController();
        $admincontroller->prepareTasks($_POST['search']);
    }

    if (isset($_GET['action']) && $_GET['action'] == 'Archives') {
        $admincontroller = new AdminController();
        $admincontroller->prepareArchives($_POST['search']);
    }

    if (isset($_GET['action']) && $_GET['action'] == 'Pomodoros') {
        $admincontroller = new AdminController();
        $admincontroller->preparePomodoros($_POST['search']);
    }

    // [ALL]

    if (isset($_GET['action']) && $_GET['action'] == 'Hola') {
        echo "Hola";
        // $admincontroller = new AdminController();
        // $admincontroller->preparePomodoros($_POST['search']);
    }

    
?>