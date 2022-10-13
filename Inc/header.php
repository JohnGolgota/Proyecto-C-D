<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Esta linea de codigo no es un EasterEgg, para nada. -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Icono página -->
    <link rel="shortcut icon" href="../Public/Img/favicon.png" type="image/x-icon">
    
    <!-- Bootstrap 5 -->
    <link rel="stylesheet" href="../Public/Css/bootstrap.min.css">
    
    <!-- hojas de estilo personalizadas -->
    <link rel="stylesheet" href="../Public/Css/style.css">
    <link rel="stylesheet" href="../Public/Css/style-user.css">
    
    <!-- librerias importadas -->
    <!-- ScrollReveal -->
    <script src="../Public/Js/scrollreveal.min.js"></script>
<head>
    <!--  -->
    <div class="container-load" id="container-load">
        <div class="push-out" id="push-out" style="z-index: 10000;">
            <div></div>
            <div></div>
        </div>
    </div>
    <!--  -->

    <script>
        function load(){
            console.log("puta");
            let containera = document.getElementById('container-load');
            console.log(containera);
            containera.style.opacity = '0';
            containera.style.display = 'none';
        }
    </script>



    