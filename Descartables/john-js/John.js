let Curiosidades = [    
// let alturaPantalla = screen.height
// let anchoPantalla = screen.width
// let webAlturaVentana = window.innerHeight
// let webAnchoVentana = window.innerWidth
]
let pruebasDeMostrarOcultar = [
/* Aquí el primer intento de mostrar y ocultar elementos
let iconosMalparidos = window.addEventListener("scroll",function(){
    console.log("buenas")
    
    // selector de elementos por nombre de clase
    let imagen = document.querySelectorAll('.sacar-derecha')[0]
    console.log(imagen)
    
    // altura de la ventana no cambia al hacer scroll
    let altura = window.innerHeight/1.5
    console.log(altura)
    
    // distancia entre el borde superior de la pantalla y los putos logos
    let distanciaImagen = imagen.getBoundingClientRect().top
    console.log(distanciaImagen)
    
    // condicion cuando la distancia entre el elemento y el borde de la pantalla coinciden muestra el elemento
    if(distanciaImagen <= altura){
        imagen.classList.add("sacar")
    }
    else{
        imagen.classList.remove("sacar")
    }
    
    // for (let logo = 0; logo < imagen.length; logo++) {
    // }
})
*/

/* No se si dejarlo o que sea temporal
let iconosMalparidos = window.addEventListener("scroll",function(){
    // console.log("buenas")
    
    // Banner para hacer pruebas de cosas
    let banner = document.getElementById('bannerS')
    // console.log(banner)
    
    let distanciaBanner = banner.getBoundingClientRect().top
    console.log(distanciaBanner)
    
    // selector de elementos por nombre de clase
    let imagen = document.querySelectorAll('.sacar-derecha')[0]
    // console.log(imagen)
    
    // altura de la ventana no cambia al hacer scroll
    let altura = window.innerHeight/1.5
    // console.log(altura)
    
    // distancia entre el borde superior de la pantalla y los putos logos
    let distanciaImagen = imagen.getBoundingClientRect().top
    // console.log(distanciaImagen)
    
    // condicion cuando la distancia entre el elemento y el borde de la pantalla coinciden muestra el elemento
    if(distanciaImagen <= altura){
        imagen.classList.add("sacar")
    }
    if(distanciaBanner >= 0){
        imagen.classList.remove("sacar")
    }
    
    // for (let logo = 0; logo < imagen.length; logo++) {
        // }
    })
*/

/* Version 1: ocultar y mostrar iconos
let iconosFlotantes = window.addEventListener("scroll",function(){
    
    let imagen = document.querySelectorAll('.sacar-derecha')[0]
    
    let banner = document.getElementById('bannerS')

    let altura = window.innerHeight/1.5
    
    let distanciaImagen = imagen.getBoundingClientRect().top
    
    let distanciaBanner = banner.getBoundingClientRect().top
    
    if(distanciaImagen <= altura){
        imagen.classList.add("sacar")
    }
    if(distanciaBanner >= 0){
        imagen.classList.remove("sacar")
    }
})
*/

/* Version 2: ocultar y mostrar iconos
let iconos = window.addEventListener("scroll",function(){

    let banner = document.getElementById("bannerS")
    
    let distanciaBanner = banner.getBoundingClientRect().top
    
    let logos = document.querySelectorAll(".sacar-derecha")[0]
    
    if(distanciaBanner < 0){
        logos.classList.add("sacar")
    }
    else {
        logos.classList.remove("sacar")
    }
})
*/
]
let datosDesplegablesDePieDePagina = [
    // Enlaces de barras de navegacion
    /* 
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
    */
]
