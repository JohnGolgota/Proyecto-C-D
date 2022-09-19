<?php
// $id = $_GET['id'];

// include './bd/conexion-php/conexiondb.php';
// $conexion = new Conexion();
// $conexion->BdConnect();

// $sql = "SELECT * FROM tbl_usuario WHERE id_usr=$id";

// $buscar = $conexion->stm->prepare($sql);
// $buscar->execute();

// $rowUser = $buscar->fetchAll(PDO::FETCH_OBJ);
// foreach ($rowUser as $user) {
// }

// var_dump($user);
# nice code.
?>
<?php 
    include '../Inc/header.php'; 
    session_start();
    
?>
<title> Carpe Diem | <?php echo $_SESSION['nombre_usr']; ?> </title>
<?php include '../Inc/nav.php'; ?>

<!-- Encabezado, botones y tema -->
<header class="align-items-center navbar navbar-expand-sm position-relative cabeza d-flex">
    <nav class="container-xxl cabeza-nav-user">
        <!-- logo -->
        <section class=""><a href="#"><img src="./Imagenes/favicon-min.png" alt="Logo" width="35px"></a></section>

        <!-- botones -->
        <section class="d-inline align-items-end text-end position-absolute end-0 botones row">
            <!-- Boton "+" -->
            <section class="nav-item">
                <button class="boton-mas"> + </button>
            </section>

            <!-- switch -->
            <section class="contenido-switch"><label class="switch align-items-center"><input type="checkbox" class="input-banner"><span class="slider"></span></label></section>

            <!-- Boton user -->
            <section class="mt-2 usuario">
                <i class="fa-solid fa-user icono"></i><label onclick="configDesplegable();" for="" class="user-nav label-nav"> <?php echo $_SESSION['nombre_usr']; ?> </label>
            </section>
          
            <aside id="configDesplegable" style="display: none;" class="menu-no">
                <!--  -->
                <section class="contenido-menu">
                    <ul>
                        <hr class="salto">
                        <li><a href="#"></a></li>
                        <li><a href=""> Configuracion </a></li>
                        <hr class="salto">
                        <li><a href="#HerramientaUno"> Personalizacion </a></li>
                        <hr class="salto">
                        <li><details>
                                <summary> Actualizar Informacion </summary>
                                <a href=""  data-bs-toggle="modal" data-bs-target="#exampleModal">Nombre De Usuario </a>
                            </details>
                        </li>
                        <li><a href="../Controllers/UserController.php?action=delete"> Eliminar Cuenta </a></li>
                        <li><a href="./UserController.php"> Cerrar sesión </a></li>
                    </ul>
                </section>

            <!-- boton Menu Desplegable. -->
            <button class="boton menu-user" onclick="menuDesplegable();"> ... </button>
            <aside id="menuDesplegable" style="display: none;" class="menu-no">
                <!--  -->
                <section class="contenido-menu">
                    <ul>
                        <hr class="salto">
                        <li><a href="#"></a></li>
                        <li><a href="">Cuenta</a></li>
                        <hr class="salto">
                        <li><a href="#HerramientaUno"> Agenda </a></li>
                        <li><a href="#HerramientaDos"> Reloj Pomodoro </a></li>
                        <hr class="salto">
                        <li><a href="#HerramientaCuatro"> ? </a></li>
                        <hr class="salto">
                        <li><a href="index.html"> Cerrar sesión </a></li>
                    </ul>
                </section>
            </aside>
        </section>
    </nav>
</header>
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"> Actualiza Nombre De Usuario </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
        <form action="UserController.php" method="POST">
            <input type="hidden" name="action" value="actualizar">
            <div class="modal-body">
                <label for="nombre"> Nombre Actual </label>
                <input type="text" class="form-control" value="<?php echo $_SESSION['nombre_usr']; ?>" readonly>
                <hr class="salto">
                <label for="nombre"> Nuevo Nombre De Usuario </label>
                <input type="text" placeholder="SpiritDark1164" class="form-control shadow-none" name="nombre_usr">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
        </form>
    </div>
  </div>
</div>
<!--  -->
<main>

    <!--  -->
    <section class="superbox bg-secondary calendar-box">
        <iframe src="https://calendar.google.com/calendar/embed?height=720&wkst=1&bgcolor=%231363df&ctz=America%2FBogota&showTitle=0&showNav=1&src=M2R0dW5pbmdkdXZhbkBnbWFpbC5jb20&src=YWRkcmVzc2Jvb2sjY29udGFjdHNAZ3JvdXAudi5jYWxlbmRhci5nb29nbGUuY29t&src=ZXMuY28jaG9saWRheUBncm91cC52LmNhbGVuZGFyLmdvb2dsZS5jb20&src=ZW4uY28jaG9saWRheUBncm91cC52LmNhbGVuZGFyLmdvb2dsZS5jb20&color=%23039BE5&color=%2333B679&color=%230B8043&color=%230B8043" width="1280" height="720" frameborder="0" scrolling="no" class="calendar-content"></iframe>
    </section>

    <!--  -->
    <section class="text-center my-2 herramientas">

        <!--  -->
        <article class="row align-items-center my-2 herramienta herramienta-dos">

            <!--  -->
            <section class="col">
                <h3></h3>
                <p></p>
            </section>

            <!--  -->
            <!-- <section class="col"><img src="" alt="Agenda"></section> -->
        </article>

        <!--  -->
        <article class="row align-items-center herramienta herramienta-tres">

            <!--  -->
            <!-- <section class="col">
        <img src="" alt="Agenda">
        </section> -->

            <!--  -->
            <section class="col">
                <h3>Lorem ipsum dolor sit amet.</h3>
                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quaerat inventore sit hic dignissimos magni pariatur!</p>
            </section>
        </article>

        <!--  -->
        <article class="row align-items-center my-2 herramienta herramienta-cuatro">

            <!--  -->
            <section class="col">
                <h3>Lorem ipsum dolor sit amet.</h3>
                <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Iusto necessitatibus officia, odio cum blanditiis facilis.</p>
            </section>

            <!--  -->
            <section class="col"><img src="" alt="Agenda"></section>
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
                            <a href="#HerramientaTres" class="text-white"><i class="fas fa-flag pe-3"></i> Ley de Pareto </a>
                        </li>
                        <li class="mb-2">
                            <a href="#HerramientaCuatro" class="text-white"><i class="fas fa-seedling pe-3"></i> Hazlo Tu Mismo </a>
                        </li>
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

</section>

</section>

<?php include '../Inc/footer.php'; ?>