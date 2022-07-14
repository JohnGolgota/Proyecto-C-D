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
    if(style.getPropertyValue('--color1') == '#363062'){
        // Paleta normal.
        style.setProperty('--color1', '#06283D');
        style.setProperty('--color2', '#1363DF');
        style.setProperty('--color3', '#47B5FF');
        style.setProperty('--color4', '#DFF6FF');
    }

    else {
        // Paleta oscura V1
        // style.setProperty('--color1', '#041C32');
        // style.setProperty('--color2', '#04293A');
        // style.setProperty('--color3', '#064663');
        // style.setProperty('--color4', '#ECB365');

        // Paleta oscura V2
        // style.setProperty('--color1', '#0F044C');
        // style.setProperty('--color2', '#141E61');
        // style.setProperty('--color3', '#787A91');
        // style.setProperty('--color4', '#EEEEEE');

        // Paleta oscura V3
        style.setProperty('--color1', '#363062'); 
        style.setProperty('--color2', '#4D4C7D');
        style.setProperty('--color3', '#827397'); 
        style.setProperty('--color4', '#D8B9C3');
    } 
}