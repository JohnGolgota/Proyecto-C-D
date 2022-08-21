<?php
$id = $_GET['id'];

include './bd/conexion-php/conexiondb.php';
$conexion = new Conexion();
$conexion->BdConnect();

$sql = "SELECT * FROM tbl_usuario WHERE id_usr=$id";

$buscar = $conexion->stm->prepare($sql);
$buscar->execute();

$rowUser = $buscar->fetchAll(PDO::FETCH_OBJ);
foreach ($rowUser as $user) {
}

// var_dump($user);
# nice code.
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Esta linea de codigo no es un EasterEgg, para nada. -->
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title> Carpe Diem | <?php echo $user->nombre_usr; ?> </title>

  <!-- Icono página -->
  <link rel="shortcut icon" href="./Imagenes/favicon.png" type="image/x-icon">

  <!-- Bootstrap 5 -->
  <link rel="stylesheet" href="./Bootstrap/bootstrap.min.css">

  <!-- hojas de estilo personalizadas -->
  <link rel="stylesheet" href="./Estilos/style.min.css">

  <!-- librerias importadas -->
  <script src="./Scripts/scrollreveal.min.js"></script>

</head>

<body>
  <!-- Encabezado, botones y tema -->
  <header class="align-items-center navbar navbar-expand-sm position-relative cabeza">
    <nav class="container-xxl">
      <!-- logo -->
      <div><a href="./Index-user.html"><img src="./Imagenes/favicon.png" alt="Logo" width="35px"></a></div>

      <!-- botones -->
      <div class="navbar-nav d-inline align-items-end text-end position-absolute end-0 botones">
        <!-- Boton uno -->
        <button class="boton">+</button>

        <!-- switch -->
        <div class="contenido-switch"><label class="switch align-items-center"><input type="checkbox" class="input-banner"><span class="slider"></span></label></div>

        <!-- Boton user -->
        <label for=""><?php echo $user->nombre_usr . $user->id_usr; ?></label>
        <!-- boton Dos -->
        <!-- <button class="boton">Menu</button> -->
        <button type="button" class="btn btn-secondary dropdown-toggle boton" data-bs-toggle="dropdown" data-bs-display="static" aria-expanded="false">Menu</button>
        <ul class="dropdown-menu dropdown-menu-lg-end">
          <li><button class="dropdown-item" type="button">Action</button></li>
          <li><button class="dropdown-item" type="button">Another action</button></li>
          <li><button class="dropdown-item" type="button">Something else here</button></li>
        </ul>
      </div>
    </nav>
  </header>

  <!--  -->
  <main>

    <!--  -->
    <section class="superbox bg-secondary">
      <h1 class="container-sm top-50">¡¡ESTADISTICAS!!</h1>

    </section>

    <!--  -->
    <section class="text-center my-2 herramientas">

      <!--  -->
      <article class="row align-items-center herramienta herramienta-uno">
        <div id="carouselExampleFade" class="carousel slide carousel-fade" data-bs-ride="carousel">
          <div class="carousel-inner">
            <div class="carousel-item active">
              <img src="Imagenes/1.jpg" width="1360px" height="400px" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
              <img src="Imagenes/2.jpg" width="1360px" height="400px" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
              <img src="Imagenes/3.jpg" width="1360px" height="400px" class="d-block w-100" alt="...">
            </div>
          </div>
          <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
          </button>
          <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
          </button>
        </div>
      </article>

      <!--  -->
      <article class="row align-items-center my-2 herramienta herramienta-dos">

        <!--  -->
        <div class="col">
          <h3>Lorem ipsum dolor sit amet.</h3>
          <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Veniam voluptas nihil minima odio cum nulla!</p>
        </div>

        <!--  -->
        <div class="col"><img src="" alt="Agenda"></div>
      </article>

      <!--  -->
      <article class="row align-items-center herramienta herramienta-tres">

        <!--  -->
        <div class="col"><img src="" alt="Agenda"></div>

        <!--  -->
        <div class="col">
          <h3>Lorem ipsum dolor sit amet.</h3>
          <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quaerat inventore sit hic dignissimos magni pariatur!</p>
        </div>
      </article>

      <!--  -->
      <article class="row align-items-center my-2 herramienta herramienta-cuatro">

        <!--  -->
        <div class="col">
          <h3>Lorem ipsum dolor sit amet.</h3>
          <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Iusto necessitatibus officia, odio cum blanditiis facilis.</p>
        </div>

        <!--  -->
        <div class="col"><img src="" alt="Agenda"></div>
      </article>
    </section>
  </main>

  <!-- Remove the containe if you want to extend the Footer to full width. -->
  <!-- Footer -->
  <div class="container-fluid px-4 mt-3 footer-cd">

    <footer class="text-center text-lg-start text-white footer-cd-f">
      <!-- Grid container -->
      <div class="container p-4 footer-cd-d">
        <!--Grid row-->
        <div class="row my-4">
          <!--Grid column-->
          <div class="col-lg-3 col-md-6 mb-4 mb-md-0">

            <div class="rounded-circle shadow-1-strong d-flex align-items-center justify-content-center mb-4 mx-auto" style="width: 150px; height: 150px;">
              <img src="./Imagenes/favicon-min.png" height="70" alt="" loading="lazy" />
            </div>

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

          </div>
          <!--Grid column-->

          <!--Grid column-->
          <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
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
          </div>
          <!--Grid column-->

          <!--Grid column-->
          <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
            <h5 class="text-uppercase mb-4"> Desarroladores </h5>

            <ul class="list-unstyled">
              <li class="mb-2">
                <a href="https://github.com/JohnGolgota" target="_blank" class="text-white"><i class="fas fa-user pe-3"></i>John Steban</a>
              </li>
              <li class="mb-2">
                <a href="https://github.com/DuvanArwenLazar" target="_blank" class="text-white"><i class="fas fa-user pe-3"></i>Duvan Arwen Lazar </a>
              </li>
              <li class="mb-2">
                <a href="#!" class="text-white"><i class="fas fa-user pe-3"></i>Ivan</a>
              </li>
            </ul>
          </div>
          <!--Grid column-->

          <!--Grid column-->
          <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
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
          </div>
          <!--Grid column-->
        </div>
        <!--Grid row-->
      </div>
      <!-- Grid container -->

      <!-- Copyright -->
      <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2)">
        <a class="text-white" href="#"> Carpe Diem </a>
        © 2022 All Rights Reserved
      </div>
      <!-- Copyright -->
    </footer>

  </div>

  </div>

  <!-- Scripts Inportados: -->
  <!-- Bootstrap -->
  <script src="./Bootstrap/bootstrap.bundle.min.js"></script>
  <script src="https://kit.fontawesome.com/8a160a18f4.js" crossorigin="anonymous"></script>

  <!-- Scripts perzonalizados: -->
  <!-- Animacion de los logos. -->
  <!-- <script src="./Script's/iconrevel.min.js">no hay</script> -->
  <script src="./Scripts/app.min.js"></script>
  <script src="./Scripts/main.js"></script>

  <!-- Scripts Temporales:  -->
</body>

</html>