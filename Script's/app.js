// Enlaces de barras de navegacion
function contactanos(){
    if(document.getElementById("contactanosOculto").style.display == "none"){
        document.getElementById("contactanosOculto").style.display = "block";
    }
    else {
        document.getElementById("contactanosOculto").style.display = "none";
    }
}

function quienesSomos(){
    if(document.getElementById("quienesOculto").style.display =="none"){
        document.getElementById("quienesOculto").style.display = "block";
    }

    else {
        document.getElementById("quienesOculto").style.display = "none";
    }
}

function direccionOculto(){
    if(document.getElementById("direccionOculto").style.display == "none"){
        document.getElementById("direccionOculto").style.display = "block";
    }
    
    else {
        document.getElementById("direccionOculto").style.display = "none";
    }
}

// Scroll Reveal
ScrollReveal().reveal('.header-reveal', { delay: 350 });
ScrollReveal().reveal('.superbox', { delay: 550 });
ScrollReveal().reveal('.titulo-principal', { delay: 950 });
ScrollReveal().reveal('.subtitulo-principal', { delay: 1150 });

ScrollReveal().reveal('.sacar-derecha', { delay: 450 });

ScrollReveal().reveal('.herramienta', { delay: 350 });
ScrollReveal().reveal('.img-herramienta', { delay: 550 });

ScrollReveal().reveal('.pie-pagina', { delay: 350 });
ScrollReveal().reveal('.item-reveal', { delay: 550 });

// Acceder al inicio, registro y herramientas
function menuDesplegable(){
    if(document.getElementById("menuDesplegable").style.display == "none"){
        document.getElementById("menuDesplegable").style.display = "block";
    }
    else {
        document.getElementById("menuDesplegable").style.display = "none";
    }
}