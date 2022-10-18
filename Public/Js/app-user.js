// ----------------------------------- MODO OSCURO ----------------------------------- //
const buttonDarkModeUser = document.getElementById("buttonDarkModeUser");
buttonDarkModeUser.addEventListener('click', function(){
    document.querySelector(".icono-user").classList.toggle('icono-user-dark-mode');
    document.querySelector(".nombre-user").classList.toggle('nombre-user-dark-mode');

    document.querySelector("body").classList.toggle('dark-mode');
    document.querySelector(".cabeza").classList.toggle('cabeza-dark-mode');
    // document.querySelector(".boton").classList.toggle('boton-dark-mode');
    
    document.querySelectorAll(".herramienta")[0].classList.toggle('herramienta-dark-mode');
    // document.querySelectorAll(".herramienta")[1].classList.toggle('herramienta-dark-mode');
    // document.querySelectorAll(".herramienta")[2].classList.toggle('herramienta-dark-mode');
    
    document.querySelector(".footer-cd-f").classList.toggle('footer-cd-f-dark-mode');
});



// ----------------------------------- MENU DESPLEGABLE ----------------------------------- //
function configDesplegable(){
    if(document.getElementById("configDesplegable").style.display == "none"){
        document.getElementById("configDesplegable").style.display = "block";
    }
    else {
        document.getElementById("configDesplegable").style.display = "none";
    }
}



// ----------------------------------- CONTENIDO AJAX y Jquery. ----------------------------------- //
$(document).ready(function() {
    function fetchTasks(){
        // Pedimos informacion para mostrarla en lista. Como no se especifica el momento (como en los de arriba), se ejecuta siempre.
        $.ajax({
            url: 'TaskController.php?action=GetTasks',
            type: 'GET', // GET es para recibir informacion, POST para enviar.
            data: {'hola': 'hola'},
            
            // Cuando reciba la respuesta se va a ejecutar cierta funcion:
            success: function(response){
                // console.log("Hola, Estoy En El App-user.js", response);

                let tasks = JSON.parse(response);
                // console.log("LA CONCHA DE MI HERMANA -> ", tasks);
                let template = '';
                tasks.forEach(task => {

                    // console.log("TASK -> ", task.Nombre_rec);

                        // Llenamos la Plantilla.
                        template += 
                        `
                            <div class="tasks">
                                <div class="task my-auto d-flex mb-1" style="background-color:${task.Color_rec};">
                                    <h4 class="element-task nombre-task my-auto" id="nombre-task">${task.Nombre_rec} | </h4>
                                    <h4 class="element-task notifiacion-task my-auto" id="notificacion-task">${task.Notificacion_rec}</h4>
                                </div>
                            </div>
                        `
                    });
                    
                //     // Pintamos la plantilla en el elemento seleccionado.
                    $('#tasks').html(template);
                }
            });
        }

        setInterval(fetchTasks, 250);
});