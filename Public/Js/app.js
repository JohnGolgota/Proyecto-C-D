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
    if(document.getElementById("menuDesplegable").style.display == "none"){
        document.getElementById("menuDesplegable").style.display = "block";
    }
    else {
        document.getElementById("menuDesplegable").style.display = "none";
    }
});



// -------------------------------------- "Aleatoriedad" de la frase principal. -------------------------------------- //
var frasesCabecera = ["Programa tu tiempo. Programa Tu Vida", "Cada segundo es de un valor infinito", "La vida, si se vive bien, es lo suficientemente larga", "No puedes ahorrar tiempo para usarlo otro dia", "Puedes tenerlo todo, solo que no al mismo tiempo", "El tiempo se lo lleva todo, lo quieras o no", "Los más fuertes de todos los guerreros son el tiempo y la paciencia", "Los más fuertes de todos los guerreros son el tiempo y la paciencia"];
function aleatorio(){

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
buttonDarkMode.addEventListener('click', function(){
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



// ----------------------------------- VALIDACION ----------------------------------- //
// Mas que organiza duvan
function PassValidateJS() {
    let contrasena = document.getElementById('usuarioRC').value
    let comprobarContrasena = document.getElementById('usuarioRCC').value
    let mensajeConfirmacion = document.getElementById('MensajeConfirmarContrasena')

    if (contrasena == comprobarContrasena) {
        mensajeConfirmacion.textContent = "¡Una maravilla!"
        mensajeConfirmacion.style.color = "green"
    } else {
        mensajeConfirmacion.textContent = "¡Las Contraseñas NO Coinciden! D:"
        mensajeConfirmacion.style.color = "red"
    }
}
