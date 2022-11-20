<?php
    session_start();    
    include_once '../Models/Archive.php';
    class ArchiveController extends Archive {

        public function prepareGetArchives(){
            $this->id_usr = $_SESSION['id_usr'];
            $objeto = $this->GetArchivesForId();
            echo $objeto;
        }
    }

    // --------------------------------------------------------------------------------------------------------------- //

    if (isset($_GET['action']) && $_GET['action'] == 'GetArchives') {
        $archivecontroller = new ArchiveController();
        $archivecontroller->prepareGetArchives();
    }
?>