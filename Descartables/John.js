// let alturaPantalla = screen.height
// let anchoPantalla = screen.width
// let webAlturaVentana = window.innerHeight
// let webAnchoVentana = window.innerWidth

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