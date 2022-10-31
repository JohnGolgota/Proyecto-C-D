// ------------------------------------------ Scroll Reveal ------------------------------------------ //
ScrollReveal().reveal('.header-reveal', { delay: 350 });
ScrollReveal().reveal('.superbox', { delay: 550 });
ScrollReveal().reveal('.titulo-principal', { delay: 950 });
ScrollReveal().reveal('.subtitulo-principal', { delay: 1150 });

ScrollReveal().reveal('.sacar-derecha', { delay: 450 });

ScrollReveal().reveal('.herramienta', { delay: 350 });
ScrollReveal().reveal('.img-herramienta', { delay: 550 });

ScrollReveal().reveal('.pie-pagina', { delay: 350 });
ScrollReveal().reveal('.item-reveal', { delay: 550 });



// ------------------------- Acceder al inicio, registro, herramientas y configuracion. ------------------------- //
const buttonDropdownMenu = document.getElementById('buttonDropdownMenu');
buttonDropdownMenu.addEventListener('click', function () {
    if (document.getElementById("menuDesplegable").style.display == "none") {
        document.getElementById("menuDesplegable").style.display = "block";
    }
    else {
        document.getElementById("menuDesplegable").style.display = "none";
    }
});



// -------------------------------------- "Aleatoriedad" de la frase principal. -------------------------------------- //
var frasesCabecera = ["Programa tu tiempo. Programa Tu Vida", "¿Tienes sueño? ¡Pues duerme!", "¿Estas triste? ¡Pues no lo estes!", "¿Sabias que se puede vivir sin celular?", "Soy El Numero 4", "La fama me persigue, pero yo soy mas rapido.", "Más vale tarde, porque por la mañana duermo", "A alguien le importas, no a mí, pero a alguien sí le importas"];
function aleatorio() {

    let maximo = frasesCabecera.length;
    var numero = Math.random() * maximo;

    // console.log(numero);
    // let minimo = 0;

    document.getElementById("subtituloPrincipal").innerHTML = frasesCabecera[parseInt(numero)];
    // console.log("Me he ejecutado " + numero);
}

// Cada cierto tiempo "aleatorio" se va a ejecutar.
setInterval('aleatorio()', 20000);



// ----------------------------------- MODO OSCURO ----------------------------------- //
const buttonDarkMode = document.getElementById('boton-dark-mode');
buttonDarkMode.addEventListener('click', function () {
    document.querySelector(".footer-cd-f").classList.toggle('footer-cd-f-dark-mode');

    document.querySelector("body").classList.toggle('dark-mode');
    document.querySelector(".cabeza").classList.toggle('cabeza-dark-mode');
    document.querySelector(".boton").classList.toggle('boton-dark-mode');

    document.querySelector(".wave").classList.toggle('wave-dark-mode');
    document.querySelector(".-three").classList.toggle('-three-dark-mode');
    document.querySelector(".-two").classList.toggle('-two-dark-mode');
    document.querySelector(".-one").classList.toggle('-one-dark-mode');

    document.querySelectorAll(".herramienta")[0].classList.toggle('herramienta-dark-mode');
    document.querySelectorAll(".herramienta")[1].classList.toggle('herramienta-dark-mode');
    document.querySelectorAll(".herramienta")[2].classList.toggle('herramienta-dark-mode');

    document.querySelector(".herramienta-img").classList.toggle('herramienta-img-dark-mode');
    document.querySelectorAll(".modal-content")[0].classList.toggle('modal-content-dark-mode');
    document.querySelectorAll(".modal-content")[1].classList.toggle('modal-content-dark-mode');
    document.querySelector(".boton-modal").classList.toggle('boton-modal-dark-mode');
});



// ----------------------------------- VALIDACION FRONT y Ajax----------------------------------- //
// Validacion front 1 conicidencia de contraseñas en formulario Registro D
// function ValidarContraseña() {
//     let contrasena = document.getElementById('usuarioRC').value
//     let comprobarContrasena = document.getElementById('usuarioRCC').value
//     let mensajeConfirmacion = document.getElementById('MensajeConfirmarContrasena')

//     if (contrasena != comprobarContrasena) {
//         mensajeConfirmacion.textContent = "La Contraseña no coincide"
//     }
// }
// Validacion front 1.21 conicidencia de contraseñas en formulario Registro J

const hellno = $('#usuarioRCC').first().keyup(function () {

    let MensajeConfirmarContrasena

    let pass = $('#usuarioRC').val()
    let passcc = $('#usuarioRCC').val()

    if (pass != passcc) {
        MensajeConfirmarContrasena.style.color = "red"
        MensajeConfirmarContrasena.textContent = "MAL"
    }
    if (pass == passcc) {
        MensajeConfirmarContrasena.style.color = "green"
        MensajeConfirmarContrasena.textContent = "BIEN"
    }
})

const hellno = $('#usuarioRCC').first().keyup(function () {

    let mensaje = $('#MensajeConfirmarContrasena').val()

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
//
$(document).ready(function () {
    $('#formulario-registro').trigger('reset')
    $('#formulario-registro').submit(function (e) {

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
            success: function (response) {
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
                                timerInterval = setInterval(() => { }, 100)
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
                                timerInterval = setInterval(() => { }, 100)
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
                                timerInterval = setInterval(() => { }, 100)
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
                                timerInterval = setInterval(() => { }, 100)
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
                                timerInterval = setInterval(() => { }, 100)
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
                                timerInterval = setInterval(() => { }, 100)
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
                                timerInterval = setInterval(() => { }, 100)
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
                                timerInterval = setInterval(() => { }, 100)
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
            error: function (error) {
                console.log("Error ", error)
                console.error("Help");
            }
        })
    })
})
