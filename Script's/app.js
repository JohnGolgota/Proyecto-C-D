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
var frasesCabecera = ["Programa tu tiempo. Programa Tu Vida", "¿Tienes sueño? ¡Pues duerme!", "¿Estas triste? ¡Pues no lo estes!", "¿Sabias que se puede vivir sin celular?", "Soy El Numero 4", "La fama me persigue, pero yo soy mas rapido.", "Más vale tarde, porque por la mañana duermo", "A alguien le importas, no a mí, pero a alguien sí le importas"];
function aleatorio(){

    let maximo = frasesCabecera.length;
    var numero = Math.random() * maximo;

    console.log(numero);
    // let minimo = 0;
    
    document.getElementById("subtituloPrincipal").innerHTML = frasesCabecera[parseInt(numero)];
    console.log("Me he ejecutado " + numero);
}

// Cada cierto tiempo "aleatorio" se va a ejecutar.
setInterval('aleatorio()', 20000);



// ----------------------------------- MODO OSCURO ----------------------------------- //
const style = document.documentElement.style; /* Con esto accedemos al documento. */
const darkMode = () => {
    if(style.getPropertyValue('--color1') == '#383838'){
        // Paleta normal.
        style.setProperty('--color1', '#06283D');
        style.setProperty('--color2', '#1363DF');
        style.setProperty('--color3', '#47B5FF');
        style.setProperty('--color4', '#DFF6FF');
    }

    else {
        // Paleta Oscura.
        style.setProperty('.cabeza', '#000000');
        style.setProperty('--color1', '#383838'); // #000000
        // style.setProperty('--color2', '#041C32'); // #413F42
        // style.setProperty('--color3', '#000000'); // #7F8487
        // style.setProperty('--color4', '#413F42'); // #041C32 Este es una especie de azul.   
    } 
}