
/* Ventana emergente Sesión y registro */
var registro = document.getElementById("registro");
var inicio = document.getElementById("inicio");

// Para que cierre cuando se de click fuera del formulario. 
window.onclick = function(event){
    if(event.target == registro){
        registro.style.display = "none";
    }
    if(event.target == inicio){
        inicio.style.display = "none";
    }
}

// Con estas funciones cambiamos el display de los formularios.
function abrirRegistro(){
    registro.style.display = "block";
}

function cerrarRegistro(){
    registro.style.display = "none";
}

function abrirInicio(){
    inicio.style.display = "block";
}

function cerrarInicio(){
    inicio.style.display = "none";
}


// Scroll Reveal: Para que cuando el usuario haga scroll vayan apareciendo elemento por elemento.
ScrollReveal().reveal('.cabeza', {delay: 500});
ScrollReveal().reveal('.banner', {delay: 500});
// ScrollReveal().reveal('.herramientas', {delay: 700});
ScrollReveal().reveal('.herramienta', {delay: 390});
ScrollReveal().reveal('.pie-de-pagina', {delay: 400});


// CONTENIDO "IMPORTADO"


