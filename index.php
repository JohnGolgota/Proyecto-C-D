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
                <a href="https://www.facebook.com/DuvanArboledaa/" target="_blank"><img src="./Public/Img/LogosRedes/facebook.png" alt="Facebook" width="40px"></a>
            </div>

            <!-- Imgtagram -->
            <div class="">
                <a href="https://www.instagram.com/dusvan_/" target="_blank"><img src="./Public/Img/LogosRedes/instagram.png" alt="instagram" width="40px"></a>
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

            <!-- HerramientaCuatro -->
            <!-- <article class="row align-items-center my-2 herramienta herramienta-cuatro" id="HerramientaCuatro"> -->

            <!-- imagen. HerramientaCuatro -->
            <!-- <div class="col order-2">
                    <img class="herramienta-img" src="./Public/Img/herramientas/doyouself-min.png" alt="HerramientaCuatro">
                </div> -->

            <!-- descripcion. HerramientaCuatro -->
            <!-- <div class="col order-1">
                    <h3>Do it Yourself</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Aliquid, quisquam deleniti. Dolore distinctio veritatis quos?</p>
                </div> -->
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
                    <form action="" class="" id="form-inicio-sesion">
                        <input type="hidden" name="action" value="session" id="hidden-input">
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
                    <form action="./Controllers/UserController.php" method="POST" id="formulario-registro" novalidate>
                        <input type="hidden" name="action" value="registrar">
                        <input type="email" name="UsuarioRE" id="usuarioRE" placeholder="Correo" class="form-control shadow-none" required>
                        <input type="password" name="UsuarioRC" id="usuarioRC" placeholder="Contraseña" class="form-control shadow-none" required maxlength="10" minlength="4">
                        <input onkeyup="PassValidateJS();" type="password" name="UsuarioRCC" id="usuarioRCC" placeholder="Confirmar Contraseña" class="form-control shadow-none" required maxlength="10" minlength="4">
                        <p id="MensajeConfirmarContrasena"></p>
                        <div class="form-group">
                            <input required type="checkbox" name="terminosycondiciones" id="terminosycondiciones" class="form-check-input" value="aceptarteminos">
                            <label for="terminosycondiciones" id="terminosycondiciones" class="form-check-label">Aceptar los terminos y condiciones</label>
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
            // console.log("puta");
            let containera = document.getElementById('container-load');
            // console.log(containera);
            containera.style.opacity = '0';
            containera.style.display = 'none';
        }
    </script>

    <script src="./Public/Js/iconrevel.min.js"></script>
    <script src="./Public/Js/jquery-3.6.1.min.js"></script>
    <script src="./Public/Js/app.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Scripts Temporales:  -->
    <!-- <script src="./Public/Js/main.js"></script> -->

    <script>
        $(document).ready(function() {
            // Reseteamos el formulario.
            $('#form-inicio-sesion').trigger('reset');
            $('#form-inicio-sesion').submit(function(e) {
                const element_action = document.getElementById("hidden-input");
                let action;
                if (element_action.getAttribute("name") == "admin") {
                    action = 'admin-session';
                    // console.log("ENTRE EN EL ADMIN-SESSION");
                    // console.log("ACTION -> ", action);
                }

                if (element_action.getAttribute("name") == "action") {
                    // console.log("ENTRE EN EL USER-SESSION");
                    action = 'ajax-session';
                }

                e.preventDefault();
                $.ajax({
                    data: {
                        usuariois: $('#usuarioIS').val(),
                        contrasenais: $('#contrasenaIS').val(),
                        'action': action
                    },
                    url: './Controllers/UserController.php',
                    type: 'post',
                    success: function(response) {
                        // console.log(response);
                        // CAMPOS VACIOS (NOVALIDATE)
                        if ($('#usuarioIS').val() == '' || $('#contrasenaIS').val() == '') {
                            let timerInterval
                            Swal.fire({
                                title: 'Los campos NO Pueden estar vacios.',
                                timer: 2000,
                                icon: 'error',
                                timerProgressBar: false,
                                didOpen: () => {
                                    // Swal.showLoading()
                                    const b = Swal.getHtmlContainer().querySelector('b')
                                    timerInterval = setInterval(() => {
                                        // b.textContent = Swal.getTimerLeft()
                                    }, 100)
                                },
                                willClose: () => {
                                    clearInterval(timerInterval)
                                }
                            });
                        }
                        // console.log(action);
                        // USUARIO NO EXISTE (NOT FOUND)
                        if (response == "admin") {
                            window.location.assign('./Controllers/UserController.php?action=admin');
                        }

                        if (response == "not found") {
                            let timerInterval
                            Swal.fire({
                                title: 'El usuario NO Existe en la base de datos.',
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
                            });
                        }

                        // CONTRASEÑA INCORRECTA (NOT PASS)
                        if (response == "not pass") {
                            let timerInterval
                            Swal.fire({
                                title: 'Contraseña Incorrecta',
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
                            });
                        }

                        if (response == "success") {
                            window.location.assign('./Controllers/UserController.php?action=inicio');
                        }

                        // jQuery.ajax().abort()
                        // Imprimir respuesta del archivo
                        // location.href(response);

                        // console.log("RESPUESTA -> ", response); 
                    },
                    error: function(error) {
                        // console.log("ERROR ->", error); // Imprimir respuesta de error
                    }
                });
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            let edit = false;
            $('#formulario-registro').submit(function(e) {
                const postData = {
                    usuarioRE: $('#usuarioRE').val(),
                    usuarioRC: $('#usuarioRC').val(),
                    usuarioRCC: $('#usuarioRCC').val(),
                    terminosycondiciones: $('#terminosycondiciones').val()
                }
                // console.log(postData)
                let url = "./Controllers/UserController.php?action=ajax-registro"

                $.post(url, postData, function(response) {
                    // console.log("Donde me envie -> ", url, " Que recibi -> ", e);
                    // console.log("NOMBRE ->", usuarioRE);
                    // console.log("RESPUESTA DEL SERVIDOR -> ", response);

                    if (response == "Correo no valido.") {
                        let timerInterval
                        Swal.fire({
                            title: 'Por favor introduzca un correo electronico valido.',
                            timer: 2000,
                            icon: 'error',
                            timerProgressBar: false,
                            didOpen: () => {
                                // Swal.showLoading()
                                const b = Swal.getHtmlContainer().querySelector('b')
                                timerInterval = setInterval(() => {
                                    // b.textContent = Swal.getTimerLeft()
                                }, 100)
                            },
                            willClose: () => {
                                clearInterval(timerInterval)
                            }
                        });
                    }
                    if (response == "Correo en uso.") {
                        let timerInterval
                        Swal.fire({
                            title: 'El correo ya ha sido registrado.',
                            timer: 2000,
                            icon: 'error',
                            timerProgressBar: false,
                            didOpen: () => {
                                // Swal.showLoading()
                                const b = Swal.getHtmlContainer().querySelector('b')
                                timerInterval = setInterval(() => {
                                    // b.textContent = Swal.getTimerLeft()
                                }, 100)
                            },
                            willClose: () => {
                                clearInterval(timerInterval)
                            }
                        })
                    }
                    if (response == "Las contrasenas no coinciden.") {
                        let timerInterval
                        Swal.fire({
                            title: 'Las contraseñas no coinciden.',
                            timer: 2000,
                            icon: 'error',
                            timerProgressBar: false,
                            didOpen: () => {
                                // Swal.showLoading()
                                const b = Swal.getHtmlContainer().querySelector('b')
                                timerInterval = setInterval(() => {
                                    // b.textContent = Swal.getTimerLeft()
                                }, 100)
                            },
                            willClose: () => {
                                clearInterval(timerInterval)
                            }
                        })
                    }
                    if (response == "minimo 4 caracteres.") {
                        let timerInterval
                        Swal.fire({
                            title: 'La contraseña debe tener al menos 4 caracteres.',
                            timer: 2500,
                            icon: 'error',
                            timerProgressBar: false,
                            didOpen: () => {
                                // Swal.showLoading()
                                const b = Swal.getHtmlContainer().querySelector('b')
                                timerInterval = setInterval(() => {
                                    // b.textContent = Swal.getTimerLeft()
                                }, 100)
                            },
                            willClose: () => {
                                clearInterval(timerInterval)
                            }
                        })
                    }
                    if (response == "maximo 10 caracteres.") {
                        let timerInterval
                        Swal.fire({
                            title: 'La contraseña no debe tener mas de 10 caracteres.',
                            timer: 2500,
                            icon: 'error',
                            timerProgressBar: false,
                            didOpen: () => {
                                // Swal.showLoading()
                                const b = Swal.getHtmlContainer().querySelector('b')
                                timerInterval = setInterval(() => {
                                    // b.textContent = Swal.getTimerLeft()
                                }, 100)
                            },
                            willClose: () => {
                                clearInterval(timerInterval)
                            }
                        })
                    }
                    if (response == "una letra minuscula.") {
                        let timerInterval
                        Swal.fire({
                            title: 'La contraseña debe tener almenos una letra minuscula.',
                            timer: 2500,
                            icon: 'error',
                            timerProgressBar: false,
                            didOpen: () => {
                                // Swal.showLoading()
                                const b = Swal.getHtmlContainer().querySelector('b')
                                timerInterval = setInterval(() => {
                                    // b.textContent = Swal.getTimerLeft()
                                }, 100)
                            },
                            willClose: () => {
                                clearInterval(timerInterval)
                            }
                        })
                    }
                    if (response == "un numero.") {
                        let timerInterval
                        Swal.fire({
                            title: 'La contraseña debe tener almenos un numero.',
                            timer: 2500,
                            icon: 'error',
                            timerProgressBar: false,
                            didOpen: () => {
                                // Swal.showLoading()
                                const b = Swal.getHtmlContainer().querySelector('b')
                                timerInterval = setInterval(() => {
                                    // b.textContent = Swal.getTimerLeft()
                                }, 100)
                            },
                            willClose: () => {
                                clearInterval(timerInterval)
                            }
                        })
                    }
                    if (response == "success") {
                        window.location.assign('./Controllers/UserController.php?action=inicio&user=' + $('#usuarioRE').val());
                    }
                })

                $('#formulario-registro').trigger('reset');


                e.preventDefault();
                edit = false;
            });
        });
    </script>
</body>

</html>