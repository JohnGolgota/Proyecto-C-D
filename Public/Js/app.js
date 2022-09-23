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
function menuDesplegable(){
    if(document.getElementById("menuDesplegable").style.display == "none"){
        document.getElementById("menuDesplegable").style.display = "block";
    }
    else {
        document.getElementById("menuDesplegable").style.display = "none";
    }
}

function configDesplegable(){
    if(document.getElementById("configDesplegable").style.display == "none"){
        document.getElementById("configDesplegable").style.display = "block";
    }
    else {
        document.getElementById("configDesplegable").style.display = "none";
    }
}



// -------------------------------------- "Aleatoriedad" de la frase principal. -------------------------------------- //
var frasesCabecera = ["Programa tu tiempo. Programa Tu Vida", "¿Tienes sueño? ¡Pues duerme!", "¿Estas triste? ¡Pues no lo estes!", "¿Sabias que se puede vivir sin celular?", "Soy El Numero 4", "La fama me persigue, pero yo soy mas rapido.", "Más vale tarde, porque por la mañana duermo", "A alguien le importas, no a mí, pero a alguien sí le importas"];
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
function modoOscuro(){
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
    document.querySelectorAll(".herramienta")[3].classList.toggle('herramienta-dark-mode');
    
    document.querySelector(".herramienta-img").classList.toggle('herramienta-img-dark-mode');
    document.querySelector(".footer-cd-f").classList.toggle('footer-cd-f-dark-mode');
    document.querySelectorAll(".modal-content")[0].classList.toggle('modal-content-dark-mode');
    document.querySelectorAll(".modal-content")[1].classList.toggle('modal-content-dark-mode');
    document.querySelector(".boton-modal").classList.toggle('boton-modal-dark-mode');
}

function modoOscuroUser(){
    document.querySelector(".icono-user").classList.toggle('icono-user-dark-mode');
    document.querySelector(".nombre-user").classList.toggle('nombre-user-dark-mode');

    document.querySelector("body").classList.toggle('dark-mode');
    document.querySelector(".cabeza").classList.toggle('cabeza-dark-mode');
    document.querySelector(".boton").classList.toggle('boton-dark-mode');
    
    document.querySelectorAll(".herramienta")[0].classList.toggle('herramienta-dark-mode');
    document.querySelectorAll(".herramienta")[1].classList.toggle('herramienta-dark-mode');
    document.querySelectorAll(".herramienta")[2].classList.toggle('herramienta-dark-mode');
    
    document.querySelector(".footer-cd-f").classList.toggle('footer-cd-f-dark-mode');
}

// ----------------------------------- VALIDACION ----------------------------------- //

// Mas que organiza duvan
function ValidarContraseña() {
    let contrasena = document.getElementById('usuarioRC').value
    let comprobarContrasena = document.getElementById('usuarioRCC').value
    let mensajeConfirmacion = document.getElementById('MensajeConfirmarContrasena')
    
    if (contrasen == comprobarContrasena) {
        mensajeConfirmacion.textContent = "A"
    }
}