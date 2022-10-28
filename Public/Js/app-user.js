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
    let edit = false;  
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

        let url = edit === false ? 'TaskController.php?action=AddTask' : 'TaskController.php?action=UpdateTask';

        // Enviar informacion (Donde queremos enviar el dato, Que datos se envian, que se hace cuando reciba respuesta)
        $.post(url, postData, function(response){ 
            console.log("Donde me envie -> ", url, " Que recibi -> ", e);
            // console.log("ELEMENT  ->" , element);
            console.log("NOMBRE ->" , nombre_rec);
            console.log("RESPUESTA DEL SERVIDOR -> ", response);
        })

        // Reseteamos el formulario.
        $('#task-form').trigger('reset');
        fetchTasks();

        // Cancelamos el comportamiento por defecto del form.
        e.preventDefault();
        edit = false;
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
                                    <h5 class="element-task nombre-task my-auto" id="nombre-task">${task.Nombre_rec} | </h5>
                                    <h5 class="element-task notifiacion-task my-auto" id="notificacion-task">${task.Notificacion_rec}</h5>
                                    <div class="action-tasks" taskId-del="${task.id_rec}">
                                        <button class="btn btn-danger task-delete"> Eliminar </button>
                                    </div>
                                </div>
                            </div>
                        `
                    });
                    
                    // Pintamos la plantilla en el elemento seleccionado.
                    $('#tasks').html(template);
                }
            });
        }

    // ------------------------------------------------------------------------------------------------------------- //

    $(document).on('click', '#nombre-task', function(e){
        let element = $(this).next().next();
        let id_rec = $(element).attr('taskId-del');

        // console.log(element);
        // console.log(id_rec);

        $.post('TaskController.php?action=GetTask', {id_rec}, function(response){
            let task = JSON.parse(response);
            task.forEach(t => {
                // console.log(t);
                console.log(nombre_rec);

                $('#taskId').val(t.id_rec);
                $('#nombre_rec').val(t.Nombre_rec);
                $('#notificacion_rec').val(t.Notificacion_rec);
                $('#color_rec').val(t.Color_rec);
                console.log(response);
                edit = true;
            });
        });
    });

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

    // ------------------------------------------------------------------------------------------------------------- //

    setInterval(fetchTasks, 250);
    // fetchTasks();
});



// ----------------------------------- FULL CALENDAR ----------------------------------- //
var myModal = new bootstrap.Modal(document.getElementById('modal-c'))
var form_insertar = document.getElementById('form-c');

document.addEventListener('DOMContentLoaded', function() {
    console.log("Socio");
    var calendarEl = document.getElementById('calendar');
    var calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: 'dayGridMonth',
        locale: 'es', // Definimos el idioma.
        headerToolbar : { 
            left: 'prev, next, today', // Organizacion de los elementos (Lado Izquierdo).
            center: 'title',
            right: 'dayGridMonth, timeGridWeek, listWeek'
        },
        dateClick: function(info){
            console.log(info);
            document.getElementById('start').value = info.dateStr;
            document.getElementById('titulo').textContent = "Agregar Evento";
            myModal.show();
        }
    });
    calendar.render();

    form_insertar.addEventListener('submit', function(e){
        e.preventDefault();

        const title = document.getElementById('title').value;
        const color = document.getElementById('color').value;
        const fecha = document.getElementById('start').value;

        if(title == '' || color == '' || fecha == ''){
            let timerInterval
            Swal.fire({
                title: 'Los campos NO Pueden estar vacios.',
                timer: 2000,
                icon: 'error',
                timerProgressBar: false,
                didOpen: () => {
                    // Swal.showLoading()
                    const b = Swal.getHtmlContainer().querySelector('b')
                    timerInterval = setInterval(() => {
                        // b.textContent = Swal.getTimerLeft()
                    }, 100)
                },
                willClose: () => {
                    clearInterval(timerInterval)
                }
            });
        }
    });
});