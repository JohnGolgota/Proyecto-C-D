<?php
include '../Inc/header.php';
// session_start();
?>
<title> Carpe Diem | Administrador </title>
<?php include '../Inc/nav.php'; ?>
<link rel="stylesheet" href="../Public/Css/style-admin.css">

<body onload="setTimeout(load, 700);">
    <header class="align-items-center navbar navbar-expand-sm position-relative cabeza d-flex m-0">
        <nav class="container-xxl cabeza-nav-user">
            <!-- logo -->
            <section class=""><a href="#"><img src="../Public/Img/favicon-min.png" alt="Logo" width="35px"></a></section>

            <!-- botones -->
            <section class="d-inline align-items-end text-end position-absolute end-0 botones row">
                <!-- Boton user -->
                <section class="mt-2 usuario boton-usr-container">
                    <i onclick="configDesplegable();" class="fa-solid fa-user icono m-2 icono-user"></i><label onclick="configDesplegable();" for="" class="user-nav label-nav nombre-user"> Administrador </label>
                </section>
                <aside id="configDesplegable" style="display: none;" class="menu-no">
                    <!--  -->
                    <div class="contenido-menu">
                        <ul>
                            <hr class="salto">
                            <li><a href="#"></a></li>
                            <li><a href=""> Carpe Diem </a></li>
                            <hr class="salto">
                            <li><a href="#"> Usuarios </a></li>
                            <li><a href="#"> Eventos </a></li>
                            <li><a href="#"> Recordatorios </a></li>
                            <li><a href="#"> Relojes Pomodoro </a></li>
                            <li><a href="#"> Archivos </a></li>
                            <hr class="salto">
                            <li><a href="./UserController.php?action=abort"> Cerrar sesión </a></li>
                        </ul>
                    </div>
                </aside>
            </section>
        </nav>
    </header>

    <!--  -->
    <main class="main-admin">
        <!--  -->
        <div class="herramienta herramienta-busqueda row">
            <div class="titulo-principal col-md-9">
                <h3 class="resultados-titulo"> Coincidencia </h3>
            </div>
            <div class="barra-busqueda col-md-3">
                <form class="d-flex" role="search" id="form-query">
                    <input class="form-control me-2 shadow-none search" type="search" placeholder="Buscar" aria-label="Search" id="search">
                    <button class="btn btn-primary" type="submit"> Buscar </button>
                </form>
            </div>
        </div>
        <div id="resultados-usuarios" class="resultados">
            <!-- <h4 class="titulo-usuarios"> Usuarios </h4> -->
        </div>
        <div id="resultados-eventos" class="resultados">
            <!-- <h4> Usuarios </h4> -->
        </div>
        <div id="resultados-tasks" class="resultados">
            <!-- <h4> Usuarios </h4> -->
        </div>
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
                                        <input type="time" class="form-control shadow-none" id="timeend" value="03:00" required>
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
    <script src="../Public/Js/jquery-3.6.1.min.js"></script>
    <!-- <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ="crossorigin="anonymous"></script> -->
    <script src="../Public/Js/app-admin.js"></script>
</body>

</html>