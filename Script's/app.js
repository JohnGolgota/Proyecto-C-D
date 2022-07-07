
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
