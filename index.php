<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Esta linea de codigo no es un EasterEgg, para nada. -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Icono página -->
    <link rel="shortcut icon" href="./Public/Img/favicon.png" type="image/x-icon">

    <!-- Bootstrap 5 -->
    <link rel="stylesheet" href="./Public/Css/bootstrap.min.css">

    <!-- hojas de estilo personalizadas -->
    <link rel="stylesheet" href="./Public/Css/style.css">

    <!-- librerias importadas -->
    <!-- ScrollReveal -->
    <script src="./Public/Js/scrollreveal.min.js"></script>

    <!-- Pantalla De Carga. -->
    <link rel="stylesheet" href="./Public/Css/push-out.css">
    <title> Carpe Diem | Inicio </title>
</head>

<!--  -->
<div class="container-load" id="container-load">
    <div class="push-out" id="push-out" style="z-index: 1000;">
        <div></div>
        <div></div>
    </div>
</div>
<!--  -->

<body class="" onload="setTimeout(load, 700);">
    <!-- Encabezado, botones y modo oscuro -->
    <header class="align-items-center navbar navbar-expand-sm position-relative header-reveal cabeza cabeza-dark" id="cabeza">
        <nav class="container-xxl cabeza-nav">

            <!-- logo -->
            <div class="elemento-icon-cabeza">
                <a href="/" target=""><img src="./Public/Img/favicon-min.png" alt="Logo" width="35px" class="nav-brand"></a>
            </div>

            <!-- botones -->
            <div class="navbar-nav d-inline align-items-end text-end position-absolute end-0 botones">

                <!-- switch -->
                <div class="contenido-switch my-auto">
                    <label class="switch align-items-center">
                        <input type="checkbox" class="input-banner" id="boton-dark-mode">
                        <span class="slider"></span>
                    </label>
                </div>

                <!-- inicio sesión -->
                <button type="button" class="boton btn-uno btn-oculto-head" data-bs-toggle="modal" data-bs-target="#inicioSesionU" data-bs-whatever="@getbootstrap"> Inicia Sesion </button>

                <!-- registro -->
                <button type="button" class="boton btn-dos btn-oculto-head" data-bs-toggle="modal" data-bs-target="#registroU" data-bs-whatever="@getbootstrap"> Registrate </button>

                <!-- Oculto -->
                <button class="oculto boton" id="buttonDropdownMenu">...</button>

            </div>
            <!-- Menu Desplegable. -->
            <aside id="menuDesplegable" style="display: none;" class="menu-no">
                <!--  -->
                <div class="contenido-menu">
                    <hr class="salto">
                    <!-- <a href="#" class="el-de-arriba"> ¡Inicia Sesion! </a> -->
                    <!-- <a href="#"> Registrate </a> -->
                    <button type="button" class="menu-boton-oculto" data-bs-toggle="modal" data-bs-target="#inicioSesionU" data-bs-whatever="@getbootstrap"> Inicia Sesion </button>
                    <button type="button" class="menu-boton-oculto" data-bs-toggle="modal" data-bs-target="#registroU" data-bs-whatever="@getbootstrap"> Registrate </button>

                    <hr class="salto">
                    <ul>
                        <li><a href="#HerramientaUno"> Agenda </a></li>
                        <li><a href="#HerramientaDos"> Reloj Pomodoro </a></li>
                        <li><a href="#HerramientaTres"> Recordatorios </a></li>
                        <!-- <li><a href="#HerramientaCuatro"> ? </a></li> -->
                    </ul>
                </div>
            </aside>
        </nav>
    </header>

    <!-- Contenido principal: Banner, Redes sociales, Herramientas -->
    <main class="hell-main">

        <!-- Banner -->
        <section class="superbox" id="bannerS">
            <div class='box'>
                <div class='wave -one'></div>
                <div class='wave -two'></div>
                <div class='wave -three'></div>
            </div>
            <div class="titulo-subtitulo-banner">
                <h1 class="titulo-principal" id="tituloPrincipal"> Carpe Diem </h1>
                <h4 class="subtitulo-principal" id="subtituloPrincipal"> Programa tu tiempo. Programa tu vida. </h4>
            </div>
        </section>

        <!-- Redes sociales -->
        <aside class="sacar-derecha">

            <!-- Facebook -->
            <div class="">
                <a href="https://www.facebook.com/" target="_blank"><img src="./Public/Img/LogosRedes/facebook.png" alt="Facebook" width="40px"></a>
            </div>

            <!-- Imgtagram -->
            <div class="">
                <a href="https://www.instagram.com/" target="_blank"><img src="./Public/Img/LogosRedes/instagram.png" alt="instagram" width="40px"></a>
            </div>
        </aside>

        <section class="text-center my-2 herramientas fs-4">

            <!-- Agenda -->
            <article class="row align-items-center herramienta herramienta-uno" id="HerramientaUno">

                <!-- imagen. Agenda -->
                <div class="col">
                    <img class="herramienta-img" src="./Public/Img/herramientas/Agenda.png" alt="Agenda">
                </div>

                <!-- descripcion. Agenda -->
                <div class="col">
                    <h3>¡Programa tus actividades!</h3>
                    <p>Con nuestra herramienta Crear Agenda podras estructurar tu dia de la manera mas optima.</p>
                </div>
            </article>

            <!-- HerramientaDos -->
            <article class="row align-items-center my-2 herramienta herramienta-dos" id="HerramientaDos">

                <!-- imagen. HerramientaDos -->
                <div class="col order-2">
                    <img class="herramienta-img" src="./Public/Img/herramientas/pomodoro-min.png" alt="HerramientaDos">
                </div>

                <!-- descripcion. HerramientaDos -->
                <div class="col order-1">
                    <h3>Reloj Pomodoro</h3>
                    <p>¡Estructura tus actividades de la mejor manera y sé más productivo!</p>
                </div>
            </article>

            <!-- HerramientaTres -->
            <article class="row align-items-center herramienta herramienta-tres" id="HerramientaTres">

                <!-- imagen. HerramientaTres -->
                <div class="col">
                    <img class="herramienta-img" src="./Public/Img/herramientas/pareto-min.png" alt="HerramientaTres">
                </div>

                <!-- descripcion. HerramientaTres -->
                <div class="col">
                    <h3>Recordatorios</h3>
                    <p class="">¡Agrega pequeños recordatorios y que no se te olvide nada!</p>
                </div>
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
                            <img src="./Public/Img/favicon-min.png" height="70" alt="" loading="lazy" />
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
                                <a href="#HerramientaTres" class="text-white"><i class="fas fa-flag pe-3"></i> Recordatorios </a>
                            </li>
                            <!-- <li class="mb-2">
                                <a href="#HerramientaCuatro" class="text-white"><i class="fas fa-seedling pe-3"></i> Hazlo Tu Mismo </a>
                            </li> -->
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
                                <!-- <a href="#!" class="text-white"><i class="fas fa-user pe-3"></i>Ivan</a> -->
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
                                <p><i class="fa-brands fa-github pe-2"></i> GitHub -> Proyecto-C-D </p>
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


    <!-- inicio de sesión y registro bootstrap dialogo flotante -->
    <!-- Inicio sesión -->
    <div class="modal fede" id="inicioSesionU" tabindex="1" aria-labelledby="InicioLabel" aria-hidden="true">

        <!-- Ventana -->
        <div class="modal-dialog ">
            <!-- Contenido en la ventana -->
            <div class="modal-content align-items-center">

                <!-- Encabezado. Logo -->
                <div class="modal-header">
                    <img src="./Public/Img/favicon.png" alt="Logo" width="60px">
                </div>

                <!-- Cuerpo. Formulario -->
                <div class="modal-body formularios formulario-inicio">
                    <form action="./Controllers/UserController.php" method="POST" class="" novalidate>
                        <input type="hidden" name="action" value="session">
                        <input type="text" name="UsuarioIS" id="usuarioIS" placeholder="Nombre De Usuario" class="form-control shadow-none" required>
                        <input type="password" name="ContrasenaIS" id="contrasenaIS" placeholder="Contraseña" class="form-control shadow-none" required>

                        <input type="submit" value="¡Inicia Sesión!" class="btn btn-primary boton-modal">
                    </form>
                </div>

                <!-- Pie de pagina. metodos de inicio -->
                <div class="modal-footer">
                    <a href="UserController.php"><img src="./Public/Img/LogosRedes/facebook.png" alt="Facebook" width="50px"></a>
                    <a href="#"><img src="./Public/Img/LogosRedes/instagram.png" alt="Google" width="50px"></a>
                </div>
            </div>
        </div>
    </div>

    <!-- registro -->
    <div class="modal fade inicio-sesion-registro" id="registroU" tabindex="-1" aria-labelledby="registroLabel" aria-hidden="true">

        <!-- ventana -->
        <div class="modal-dialog">

            <!-- contenido de la ventana -->
            <div class="modal-content align-items-center">

                <!-- encabezado. Logo -->
                <div class="modal-header">
                    <img src="./Public/Img/favicon.png" alt="Logo" width="60px">
                </div>

                <!-- Cuerpo. Formulario -->
                <div class="modal-body formularios formulario-registro">
                    <form id="formulario-registro" novalidate>
                        <!-- <input type="hidden" name="action" value="registrar"> -->
                        <input type="email" name="UsuarioRE" id="usuarioRE" placeholder="Correo" class="form-control shadow-none" required>
                        <input type="password" name="UsuarioRC" id="usuarioRC" placeholder="Contraseña" class="form-control shadow-none" required maxlength="10" minlength="4">
                        <input type="password" name="UsuarioRCC" id="usuarioRCC" placeholder="Confirmar Contraseña" class="form-control shadow-none" required maxlength="10" minlength="4">
                        <span id="MensajeConfirmarContrasena"></span>
                        <div class="form-group">
                            <input required type="checkbox" name="terminosycondiciones" id="terminosycondiciones" class="form-check-input" value="aceptarteminos">
                            <label for="terminosycondiciones" class="form-check-label">Aceptar los terminos y condiciones</label>
                            <a href="#" id="buttonDetails">Detalles.</a>
                        </div>
                        <input type="submit" value="Registrarse" class="btn btn-primary boton-modal" id="btn-registro">
                    </form>
                </div>

                <!-- Pie de página. Metodos de registro -->
                <div class="modal-footer">
                    <a href=""><img src="./Public/Img/LogosRedes/facebook.png" alt="Facebook" width="50px"></a>
                    <a href=""><img src="./Public/Img/LogosRedes/instagram.png" alt="Google" width="50px"></a>
                </div>
            </div>
        </div>
    </div>

    <!-- Scripts Inportados: -->
    <!-- Bootstrap -->
    <script src="./Public/Js/bootstrap.bundle.min.js"></script>
    <script src="https://kit.fontawesome.com/8a160a18f4.js" crossorigin="anonymous"></script>

    <!-- Scripts perzonalizados: -->
    <!-- Animacion de los logos. -->
    <script src="./Public/Js/sweetalert.min.js"></script>

    <script>
        function load() {
            let containera = document.getElementById('container-load');
            console.log(containera);
            containera.style.opacity = '0';
            containera.style.display = 'none';
        }
    </script>

    <script src="./Public/Js/iconrevel.min.js"></script>
    <!-- <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script> -->

    <!-- Tampoco se -->
    <!-- <script src="./Public/Js/app.js"></script> -->

    <!-- Sabra dios -->
    <script src="./Public/Js/main.js"></script>

    <!-- Jquery & Ajax -->
    <!-- <script src="./Public/Js/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script> -->
    <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>

    <!-- Sweet -->
    <script src="./Public/Js/sweetalert2@11.js"></script>
    <!-- <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script> -->

    <!-- Scripts Temporales:  -->
    <!-- Tampoco se -->
    <script src="./Public/Js/app.js"></script>

</body>

</html>
<!-- Script para porque los .js no se actualizan -->
<script>
    const hell = $('#usuarioRCC').first().keyup(function(){
        // MensajeConfirmarContrasena
        // let mensaje = $('#MensajeConfirmarContrasena').val()
        let mensaje = document.getElementById('MensajeConfirmarContrasena')

        let pass = $('#usuarioRC').val()
        let passcc = $('#usuarioRCC').val()

        if (pass != passcc) {
            mensaje.style.color = "red"
            mensaje.textContent = "MAL"
        }
        if (pass == passcc) {
            mensaje.style.color = "green"
            mensaje.textContent = "BIEN"
        }
    })


    $(document).ready(function() {
        $('#formulario-registro').trigger('reset')
        $('#formulario-registro').submit(function(e) {

            e.preventDefault()

            $.ajax({
                data: {
                    usuarioRE: $('#usuarioRE').val(),
                    usuarioRC: $('#usuarioRC').val(),
                    usuarioRCC: $('#usuarioRCC').val(),
                    terminosycondiciones: $('#terminosycondiciones').val()
                },
                url: './Controllers/UserController.php?action=ajax-registro',
                type: 'post',
                success: function(response) {
                    console.log("RESPUESTA DEL SERVIDOR -> ", response);
                    // Campos vacios JS
                    let timerInterval
                    switch (response) {
                        // Inputs vacios
                        case "empty inputs":
                            Swal.fire({
                                title: 'Por favor introduzca un correo electronico valido.',
                                timer: 2000,
                                icon: 'error',
                                timerProgressBar: false,
                                didOpen: () => {
                                    const b = Swal.getHtmlContainer().querySelector('b')
                                    timerInterval = setInterval(() => {}, 100)
                                },
                                willClose: () => {
                                    clearInterval(timerInterval)
                                }
                            })
                            break;
                            // Correo
                        case "Correo no valido.":
                            Swal.fire({
                                title: 'Por favor introduzca un correo electronico valido.',
                                timer: 2000,
                                icon: 'error',
                                timerProgressBar: false,
                                didOpen: () => {
                                    const b = Swal.getHtmlContainer().querySelector('b')
                                    timerInterval = setInterval(() => {}, 100)
                                },
                                willClose: () => {
                                    clearInterval(timerInterval)
                                }
                            })
                            break;
                            // Correo en uso
                        case "Correo en uso.":
                            Swal.fire({
                                title: 'El correo ya ha sido registrado.',
                                timer: 2000,
                                icon: 'error',
                                timerProgressBar: false,
                                didOpen: () => {
                                    const b = Swal.getHtmlContainer().querySelector('b')
                                    timerInterval = setInterval(() => {}, 100)
                                },
                                willClose: () => {
                                    clearInterval(timerInterval)
                                }
                            })
                            break;
                            // error contraseña 1
                        case "Las contrasenas no coinciden.":
                            Swal.fire({
                                title: 'Las contraseñas no coinciden.',
                                timer: 2000,
                                icon: 'error',
                                timerProgressBar: false,
                                didOpen: () => {
                                    const b = Swal.getHtmlContainer().querySelector('b')
                                    timerInterval = setInterval(() => {}, 100)
                                },
                                willClose: () => {
                                    clearInterval(timerInterval)
                                }
                            })
                            break;
                            // error contraseña 2
                        case "minimo 4 caracteres.":
                            Swal.fire({
                                title: 'La contraseña debe tener al menos 4 caracteres.',
                                timer: 2000,
                                icon: 'error',
                                timerProgressBar: false,
                                didOpen: () => {
                                    const b = Swal.getHtmlContainer().querySelector('b')
                                    timerInterval = setInterval(() => {}, 100)
                                },
                                willClose: () => {
                                    clearInterval(timerInterval)
                                }
                            })
                            break;
                            // Error contraseña 3
                        case "maximo 10 caracteres.":
                            Swal.fire({
                                title: 'La contraseña no debe tener mas de 10 caracteres.',
                                timer: 2000,
                                icon: 'error',
                                timerProgressBar: false,
                                didOpen: () => {
                                    const b = Swal.getHtmlContainer().querySelector('b')
                                    timerInterval = setInterval(() => {}, 100)
                                },
                                willClose: () => {
                                    clearInterval(timerInterval)
                                }
                            })
                            break;
                            // Error contraseña 4
                        case "una letra minuscula.":
                            Swal.fire({
                                title: 'La contraseña debe tener almenos una letra minuscula.',
                                timer: 2000,
                                icon: 'error',
                                timerProgressBar: false,
                                didOpen: () => {
                                    const b = Swal.getHtmlContainer().querySelector('b')
                                    timerInterval = setInterval(() => {}, 100)
                                },
                                willClose: () => {
                                    clearInterval(timerInterval)
                                }
                            })
                            break;
                            // Error contraseña 5
                        case "un numero.":
                            Swal.fire({
                                title: 'La contraseña debe tener almenos un numero.',
                                timer: 2000,
                                icon: 'error',
                                timerProgressBar: false,
                                didOpen: () => {
                                    const b = Swal.getHtmlContainer().querySelector('b')
                                    timerInterval = setInterval(() => {}, 100)
                                },
                                willClose: () => {
                                    clearInterval(timerInterval)
                                }
                            })
                            break;

                        case "success":
                            break;

                        default:
                            window.location.assign(response)
                            // console.log('No deberias estar aquí\n', response)
                            break;
                    }
                },
                error: function(error) {
                    console.log("Error ", error)
                    console.error("Help");
                }
            })
        })
    })
</script>
