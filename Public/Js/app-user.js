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
function fetchTasks(){
    // Pedimos informacion para mostrarla en lista. Como no se especifica el momento (como en los de arriba), se ejecuta siempre.
    $.ajax({
        url: 'task-list.php',
        type: 'GET', // GET es para recibir informacion, POST para enviar.

        // Cuando reciba la respuesta se va a ejecutar cierta funcion:
        success: function(response){
            let tasks = JSON.parse(response);
            let template = '';
            // Recorremos las tareas para mostrarlas.
            tasks.forEach(task => {
                // Llenamos la Plantilla.
                template += 
                `
                    <tr taskId="${task.id}">
                        <td>${task.id}</td>
                        <td><a href="#" class="task-item">${task.name}</a></td>
                        <td>${task.description}</td>
                        <td>
                            <button class="task-delete btn btn-danger"> Danger </button>
                        </td>
                    </tr>
                `
            });

            // Pintamos la plantilla en el elemento seleccionado.
            $('#tasks').html(template);
        }
    });
}