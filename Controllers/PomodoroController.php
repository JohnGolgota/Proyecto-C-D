<?php
    session_start();    
    include_once '../Models/Pomodoro.php';
    class PomodoroController extends Pomodoro {

        public function preparePomodoro($evento, $actividad, $pcorta, $plarga, $id){
            $this->evento_pmd = $evento;
            $this->actividad_pmd = $actividad;
            $this->pausa_corta_pmd = $pcorta;
            $this->pausa_larga_pmd = $plarga;
            $this->id_usr = $id;

            $this->addPomodoro();
            echo "success";
        }
    }

    // -------------------------------------------------------------------------------------------------------- //

    if(isset($_GET['action']) && $_GET['action'] == 'AddPomodoro'){
        $pomodorocontroller = new PomodoroController();
        if($_POST['evento_pmd'] != ""){
            $evento = $_POST['evento_pmd'];
            echo "ENTRE AL POST";
        } else {
            $evento = "Pomodoro Timer";
            echo "ENTRE AL POR DEFECTO";
        }

        $pomodorocontroller->preparePomodoro($evento, $_POST['actividad_pmd'], $_POST['pausa_corta_pmd'], $_POST['pausa_larga_pmd'], $_SESSION['id_usr']);
    } 
?>