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



// ------------------------- Acceder al inicio, registro y herramientas ------------------------- //
function menuDesplegable(){
    if(document.getElementById("menuDesplegable").style.display == "none"){
        document.getElementById("menuDesplegable").style.display = "block";
    }
    else {
        document.getElementById("menuDesplegable").style.display = "none";
    }
}



// -------------------------------------- "Aleatoriedad" de la frase principal. -------------------------------------- //
var frasesCabecera = ["Programa tu tiempo. Programa Tu Vida", "Android > Iphone", "¿Tienes sueño? ¡Pues duerme!", "¿Estas triste? ¡Pues no lo estes!", "¿Sabias que se puede vivir sin celular?", "Google Calendar nos la pela, igual que tu vieja."];
function aleatorio(){

    let maximo = frasesCabecera.length;
    var numero = Math.random() * maximo;

    console.log(numero);
    // let minimo = 0;
    
    document.getElementById("subtituloPrincipal").innerHTML = frasesCabecera[parseInt(numero)];
    console.log("Me he ejecutado " + numero);
}

// Cada cierto tiempo "aleatorio" se va a ejecutar.
setInterval('aleatorio()', 30000);



// ----------------------------------- MODO OSCURO ----------------------------------- //
const style = document.documentElement.style; /* Con esto accedemos al documento. */
const darkMode = () => {
    if(style.getPropertyValue('--color1') == '#4C5F7A'){
        // Paleta normal.
        style.setProperty('--color1', '#06283D');
        style.setProperty('--color2', '#1363DF');
        style.setProperty('--color3', '#47B5FF');
        style.setProperty('--color4', '#DFF6FF');
    }

    else {
        // Paleta oscura
        style.setProperty('--color1', '#4C5F7A');
        style.setProperty('--color2', '#393E6F');
        style.setProperty('--color3', '#3D2E4F');
        style.setProperty('--color4', '#321D2F');
    } 
}