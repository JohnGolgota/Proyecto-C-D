// ----------------------------------- MODO OSCURO ----------------------------------- //
const buttonDarkModeUser = document.getElementById("buttonDarkModeUser");
buttonDarkModeUser.addEventListener('click', function(){
    document.querySelector(".icono-user").classList.toggle('icono-user-dark-mode');
    document.querySelector(".nombre-user").classList.toggle('nombre-user-dark-mode');
    document.querySelector("body").classList.toggle('dark-mode');
    document.querySelector(".cabeza").classList.toggle('cabeza-dark-mode');
    document.querySelectorAll(".herramienta")[0].classList.toggle('herramienta-dark-mode');
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
    // Seleccionamos el formulario. Capturaremos su evento 'submit', que manejaremos con una funcion. 
    // 'e' es la informacion del evento, que la necesitamos para modificar el comportamiento por defecto del form.
    $('#task-form').submit(function(e){
        
        // Vamos a crear un objeto que se encarge de almacenar los valores de los inputs. Que es lo que enviaremos al servidor.
        const postData = {
            nombre_rec: $('#nombre_rec').val(),
            notificacion_rec: $('#notificacion_rec').val(),
            color_rec: $('#color_rec').val(),
            id_rec: $('#taskId').val()
        }

        // Enviar informacion (Donde queremos enviar el dato, Que datos se envian, que se hace cuando reciba respuesta)
        $.post('TaskController.php?action=AddTask', postData, function(response){ 
            // console.log("RESPUESTA -> ", response); 
        })

        // Reseteamos el formulario.
        $('#task-form').trigger('reset');
        // fetchTasks();

        // Cancelamos el comportamiento por defecto del form.
        e.preventDefault();
    });

    // ------------------------------------------------------------------------------------------------------------- //

    function fetchTasks(){
        // Pedimos informacion para mostrarla en lista. Como no se especifica el momento (como en los de arriba), se ejecuta siempre.
        $.ajax({
            url: 'TaskController.php?action=GetTasks',
            type: 'GET', // GET es para recibir informacion, POST para enviar.
            data: {'hola': 'hola'},
            
            // Cuando reciba la respuesta se va a ejecutar cierta funcion:
            success: function(response){
                // console.log("ESTA ES LA RESPUESTA -> ", response);

                let tasks = JSON.parse(response);
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
                                    <div class="action-tasks" taskId-del="${task.id_rec}">
                                        <button class="btn btn-danger task-delete"> Eliminar </button>
                                    </div>
                                </div>
                            </div>
                        `
                    });
                    
                //     // Pintamos la plantilla en el elemento seleccionado.
                    $('#tasks').html(template);
                }
            });
        }

    // ------------------------------------------------------------------------------------------------------------- //

    $(document).on('dblclick', '#nombre-task', function(e){});

    // ------------------------------------------------------------------------------------------------------------- //

    $(document).on('click', '.task-delete', function (){
        swal({
            title: "¿Estas Seguro?",
            text: "Se borrara tu recordatorio, ¡no podras recuperarlo!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {
                let element = $(this)[0].parentElement;
                let id_rec = $(element).attr('taskId-del');
                $.post('TaskController.php?action=DeleteTask', {id_rec}, function(response){ /* console.log(response); */ });
    
                swal('¡Poof! Tu recordatorio ha sido eliminado', {
                    icon: "success",
                });
    
            } else {
                swal("¡Vale!");
            }
        });
    });

    setInterval(fetchTasks, 250);
});








