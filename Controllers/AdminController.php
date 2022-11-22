<?php
    session_start();    
    include_once '../Models/Admin.php';
    class AdminController extends Admin {

        public function prepareQuery($search){
            $this->data = $search;
            $objeto = $this->Query();
            echo $objeto;
        }
    }

    // --------------------------------------------------------------------------------------------------------------- //

    if (isset($_GET['action']) && $_GET['action'] == 'Query') {
        $admincontroller = new AdminController();
        $admincontroller->prepareQuery($_POST['search']);
        // echo "puta";
    }
?>