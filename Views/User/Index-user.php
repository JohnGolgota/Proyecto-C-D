<?php
    include '../Inc/header.php';
    // session_start();
?>

<style>
    .add-reminder-button {
        border: none;
        border-radius: 100%;
        background-color: #1363DF;
        padding: 3.5px 11px;
        color: white;
    }
</style>

<title> Carpe Diem | <?php echo $_SESSION['nombre_usr']; ?> </title>
<?php include '../Inc/nav.php'; ?>
<body onload="setTimeout(load, 700);">
<!-- Encabezado, botones y tema -->
<header class="align-items-center navbar navbar-expand-sm position-relative cabeza d-flex m-0">
    <nav class="container-xxl cabeza-nav-user">
        <!-- logo -->
        <section class=""><a href="#"><img src="../Public/Img/favicon-min.png" alt="Logo" width="35px"></a></section>

        <!-- botones -->
        <section class="d-inline align-items-end text-end position-absolute end-0 botones row">
            <!-- Boton user -->
            <section class="mt-2 usuario boton-usr-container">
                <i onclick="configDesplegable();" class="fa-solid fa-user icono m-2 icono-user"></i><label onclick="configDesplegable();" for="" class="user-nav label-nav nombre-user"> <?php echo $_SESSION['nombre_usr']; ?> </label>
            </section>

            <!-- Boton "+" -->
            <section class="nav-item boton-mas-container">
                <button class="boton-mas" data-bs-toggle="modal" data-bs-target="#addreminder"> + </button>
            </section>

            <!-- switch -->
            <section class="contenido-switch contenido-switch-user">
                <label class="switch align-items-center">
                    <input type="checkbox" class="input-banner" id="buttonDarkModeUser">
                    <span class="slider"></span>
                </label>
            </section>

            <aside id="configDesplegable" style="display: none;" class="menu-no">
                <!--  -->
                <div class="contenido-menu">
                    <ul>
                        <hr class="salto">
                        <li><a href="#"></a></li>
                        <li><a href=""> Carpe Diem </a></li>
                        <hr class="salto">
                        <li><a href="#" data-bs-toggle="modal" data-bs-target="#addreminder" id="rec-desplegable"> Recordatorios </a></li>
                        <li><a href="#herramientaCalendar" id="cal-desplegable"> Calendario </a></li>
                        <li><a href="#herramientaPomodoro" id="pom-desplegable"> Reloj Pomodoro </a></li>
                        <hr class="salto">
                        <li><a href="#" data-bs-toggle="modal" data-bs-target="#reminderarchive"> Archivo </a></li>
                        <hr class="salto">
                        <li>
                            <details>
                                <summary> Actualizar Informacion </summary>
                                <a href="" data-bs-toggle="modal" data-bs-target="#exampleModal"> Datos Basicos </a><br>
                                <a href="" data-bs-toggle="modal" data-bs-target="#changepassword"> Contraseña </a>
                            </details>
                        </li>
                        <li><a href="../Controllers/UserController.php?action=delete"> Eliminar Cuenta </a></li>
                        <li id="cerrar-sesion"><a href="./UserController.php?action=abort" target="_blank"> Cerrar sesión </a></li>
                    </ul>
                </div>
            </aside>
        </section>
    </nav>
</header>
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"> Actualizar Informacion </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="" id="form-actualizar">
                <input type="hidden" name="action" value="actualizar">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="nombre"> Nombre Actual </label>
                            <input type="text" class="form-control" value="<?php echo $_SESSION['nombre_usr']; ?>" readonly>
                        </div>
                        <div class="col-md-6">
                            <label for="nombre"> Correo Actual </label>
                            <input type="text" class="form-control" value="<?php echo $_SESSION['correo_usr']; ?>" readonly>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="nombre"> Nuevo Nombre </label>
                            <input type="text" placeholder="SpiritDark1164" class="form-control shadow-none" name="nombre_usr" id="nombre_usr" minlength="4">
                            <!-- <hr class="salto"> -->
                        </div>
                        <div class="col-md-6">
                            <label for="nombre"> Nuevo Correo Electronico </label>
                            <input type="email" placeholder="SpiritDark1164@gmail.com" class="form-control shadow-none" name="correo_usr" id="correo_usr">
                            <!-- <hr class="salto"> -->
                        </div>
                    </div>
                    <div class="row">
                    <div class="col-md-12">
                        <label for="nombre"> Ingrese su contraseña para CONFIRMAR </label>
                        <input type="password" placeholder="DuvanArwenLazar" class="form-control shadow-none" name="contrasena_usr" id="contrasena_usr" required>
                    </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"> Cerrar </button>
                    <button type="submit" class="btn btn-primary"> Guardar Cambios </button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="changepassword" tabindex="-1" aria-labelledby="changepassword" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="changepassword"> Actualizar Informacion </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="" id="form-password">
                <input type="hidden" name="action" value="act_contrasena">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <label for="nombre"> Contraseña Antigua </label>
                            <input type="password" placeholder="Duvan Arwen Lazar" class="form-control shadow-none" name="old_password_usr" id="old_password_usr" required minlength="6">
                            <!-- <hr class="salto"> -->
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label for="nombre"> Nueva Contraseña </label>
                            <input type="password" placeholder="Jiss Golgota" class="form-control shadow-none" name="new_password_usr" id="new_password_usr" required>
                        </div>
                        <div class="col-md-6">
                            <label for="nombre"> Confirmar Contraseña </label>
                            <input type="password" placeholder="Jiss Golgota" class="form-control shadow-none" name="confirm_password_usr" id="confirm_password_usr" required>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"> Cerrar </button>
                    <button type="submit" class="btn btn-primary"> Guardar Cambios </button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="addreminder" tabindex="1" aria-labelledby="addreminderLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <form id="task-form" class="form-group row">
            <input type="hidden" id="taskId">
            <div class="col-md-1 content-btn content-config align-middle my-auto">
                <button type="submit" class="add-reminder-button"> + </button>
            </div>
            <div class="content-input col-md-4 content-config my-auto">
                <input type="text" id="nombre_rec" placeholder="Voy a..." class="form-control shadow-none col-md-3" required>
            </div>
            <div class="content-not col-md-5 content-config my-auto">
                <input type="datetime-local" id="notificacion_rec" class="form-control shadow-none" required>
            </div>
            <div class="content-color content-confg col-md-1 my-auto">
                <input type="color" id="color_rec" class="" value="#1363DF" required>
            </div>
        </form>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
            <h3> Tus Recordatorios </h3>
            <div class="col-md-12">
                <div class="tasks" id="tasks">
                    <!-- <div class="task my-auto d-flex mb-1">
                        <h4 class="element-task nombre-task my-auto" id="nombre-task"> Nombre </h4>
                        <h4 class="element-task notifiacion-task my-auto" id="notificacion-task"> 2022-10-21 15:44:34 </h4>
                    </div> -->
                </div>
            </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Listo</button>
      </div>
    </div>
  </div>
</div>

<!-- ARCHIVO -->
<div class="modal fade" id="reminderarchive" tabindex="1" aria-labelledby="reminderarchiveLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <h3> Recordatorios Archivados </h3>
                <div class="col-md-12">
                    <div class="tasks" id="archive">
                    <!-- <div class="task my-auto d-flex mb-1">
                        <h4 class="element-task nombre-task my-auto" id="nombre-task"> Nombre </h4>
                        <h4 class="element-task notifiacion-task my-auto" id="notificacion-task"> 2022-10-21 15:44:34 </h4>
                    </div> -->
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Listo</button>
            </div>
        </div>
    </div>
</div>


<!--  -->
<main>
    <!--  -->
    <section class="container mt-3 mb-5 calendar-box-user" id="herramientaCalendar">
        <div id="calendar" class=""></div>
    </section>
    
    <!--  -->
    <section class="text-center my-2 herramientas mt-5" id="herramientaPomodoro">
        <!--  -->
        <article class="col align-items-center herramienta herramienta-dos">
            <div class="circulo-reloj">
                <p class="counter my-auto" id="counter"> 00:00 </p>
                <!-- <span class="pomodoro-status"> Actividad </span> -->
            </div>
            
            <form action="" class="form-group" id="pomodoro-form">
                <!--  -->
                <section class="col mt-3">
                    <button class="btn btn-primary" id="btn-continuar">Comenzar</button>
                </section>

                <!--  -->
                <div class="left-inputs">
                    <label for="customRange1" class="form-label first-label"> Tiempo Actividad </label>
                    <input type="range" class="form-range" min="0" max="120" step="0.5" id="customRange1">
                    <label for="customRange2" class="form-label second-label"> Pausa Corta </label>
                    <input type="range" class="form-range" min="0" max="120" step="0.5" id="customRange2">
                    <label for="customRange3" class="form-label third-label"> Pausa Larga </label>
                    <input type="range" class="form-range" min="0" max="120" step="0.5" id="customRange3">

                    <p id="first-label">-</p>
                    <p id="second-label">-</p>
                    <p id="third-label">-</p>
                </div>
            </form>
        </article>
    </section>
</main>

<!-- Remove the containe if you want to extend the Footer to full width. -->
<!-- Footer -->
<section class="container-fluid px-4 mt-3 footer-cd">

    <footer class="text-center text-lg-start text-white footer-cd-f">
        <!-- Grid container -->
        <section class="container p-4 footer-cd-d">
            <!--Grid row-->
            <section class="row my-4">
                <!--Grid column-->
                <section class="col-lg-3 col-md-6 mb-4 mb-md-0">

                    <section class="rounded-circle shadow-1-strong d-flex align-items-center justify-content-center mb-4 mx-auto" style="width: 150px; height: 150px;">
                        <img src="../Public/Img/favicon-min.png" height="70" alt="" loading="lazy" />
                    </section>

                    <p class="text-center">Carpe Diem</p>

                    <ul class="list-unstyled d-flex flex-row justify-content-center">
                        <li>
                            <a class="text-white px-2" href="#!">
                                <i class="fab fa-facebook-square"></i>
                            </a>
                        </li>
                        <li>
                            <a class="text-white px-2" href="#!">
                                <i class="fab fa-instagram"></i>
                            </a>
                        </li>
                    </ul>

                </section>
                <!--Grid column-->

                <!--Grid column-->
                <section class="col-lg-3 col-md-6 mb-4 mb-md-0">
                    <h5 class="text-uppercase mb-4"> Herramientas </h5>

                    <ul class="list-unstyled">
                        <li class="mb-2">
                            <a href="#HerramientaUno" class="text-white"><i class="fas fa-duotone fa-calendar pe-3"></i> Agenda </a>
                        </li>
                        <li class="mb-2">
                            <a href="#HerramientaDos" class="text-white"><i class="fas fa-clock pe-3"></i> Reloj Pomodoro </a>
                        </li>
                        <li class="mb-2">
                            <a href="#" class="text-white"><i class="fas fa-flag pe-3"></i> Recordatorios </a>
                        </li>
                        <!-- <li class="mb-2">
                            <a href="#HerramientaCuatro" class="text-white"><i class="fas fa-seedling pe-3"></i> Hazlo Tu Mismo </a>
                        </li> -->
                    </ul>
                </section>
                <!--Grid column-->

                <!--Grid column-->
                <section class="col-lg-3 col-md-6 mb-4 mb-md-0">
                    <h5 class="text-uppercase mb-4"> Desarroladores </h5>

                    <ul class="list-unstyled">
                        <li class="mb-2">
                            <a href="https://github.com/JohnGolgota" target="_blank" class="text-white"><i class="fas fa-user pe-3"></i>John Steban</a>
                        </li>
                        <li class="mb-2">
                            <a href="https://github.com/DuvanArwenLazar" target="_blank" class="text-white"><i class="fas fa-user pe-3"></i>Duvan Arwen Lazar </a>
                        </li>
                        <li class="mb-2">
                            <!-- <a href="#!" class="text-white"><i class="fas fa-user pe-3"></i>Ivan</a> -->
                        </li>
                    </ul>
                </section>
                <!--Grid column-->

                <!--Grid column-->
                <section class="col-lg-3 col-md-6 mb-4 mb-md-0">
                    <h5 class="text-uppercase mb-4"> Contacto </h5>

                    <ul class="list-unstyled">
                        <li>
                            <p><i class="fas fa-envelope pe-2"></i>Correo@misena.edu.co</p>
                        </li>
                        <li>
                            <p><i class="fas fa-map-marker-alt pe-2"></i> Complejo Norte - C.T.G.I </p>
                        </li>
                        <li>
                            <p><i class="fas fa-phone pe-2 mb-0"></i> GitHub -> Proyecto-C-D </p>
                        </li>
                    </ul>
                </section>
                <!--Grid column-->
            </section>
            <!--Grid row-->
        </section>
        <!-- Grid container -->

        <!-- Copyright -->
        <section class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2)">
            <a class="text-white" href="#"> Carpe Diem </a>
            © 2022 All Rights Reserved
        </section>
        <!-- Copyright -->
    </footer>
    <div class="modal fade" id="modal-c" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdrop" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                <h5 class="modal-title" id="titulo"></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div>
                <form id="form-c" class="form-group">
                    <div class="modal-body">
                        <div class="mb-3">
                            <input type="hidden" id="id_evn" name="id_evn">
                            <label for="nombre_evn" class="form-label"> Evento * </label>
                            <input type="text" class="form-control shadow-none" id="nombre_evn" required>
                        </div>
                        <div class="mb-3">
                            <label for="descripcion_evn" class="form-label"> Descripcion </label>
                            <input type="text" class="form-control shadow-none" id="descripcion_evn">
                        </div>
                        <div class="mb-3">
                            <label for="color_evn" class="form-label"> Color * </label>
                            <input type="color" class="form-control shadow-none" id="color_evn" required>
                        </div>
                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label for="start" class="form-label"> Desde (Año, Mes, Dia) * </label>
                                <input type="text" class="form-control shadow-none" id="start" required minlength="10" maxlength="10">
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="time" class="form-label"> Hora Inicio * </label>
                                <input type="time" class="form-control shadow-none" id="time" value="12:00" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label for="end" class="form-label"> Hasta (Año, Mes, Dia) * </label>
                                <input type="text" class="form-control shadow-none" id="end" value="<?php echo date("o-m-d"); ?>" required minlength="10" maxlength="10">
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="timeend" class="form-label"> Hora Final * </label>
                                <input type="time" class="form-control shadow-none" id="timeend" value="15:00" required>
                            </div>
                        </div>
                        
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-success" id="btnPomodoro" style="display:none;"> Usar Con Pomodoro </button>
                        <button type="submit" class="btn btn-primary" id="btnAccion"></button>
                        <button type="button" class="btn btn-danger" id="btnEliminar"> Eliminar </button>
                        <button type="button" class="btn btn-warning" data-bs-dismiss="modal"> Cancelar </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
</section>
<audio id="audio_alert" src="../Public/Snd/not.mp3" preload="auto" muted="muted"></audio>
<script src="../Public/Js/jquery-3.6.1.min.js"></script>
<!-- <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ="crossorigin="anonymous"></script> -->
<?php include '../Inc/footer-user.php'; ?>