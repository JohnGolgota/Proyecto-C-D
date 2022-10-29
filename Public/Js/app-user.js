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
            // console.log("Donde me envie -> ", url, " Que recibi -> ", e);
            // console.log("ELEMENT  ->" , element);
            // console.log("NOMBRE ->" , nombre_rec);
            // console.log("RESPUESTA DEL SERVIDOR -> ", response);
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
                                    <h5 class="element-task notifiacion-task my-auto" id="notificacion-task"> ${task.Notificacion_rec} </h5>
                                    <div class="action-tasks" taskId-del="${task.id_rec}">
                                        <button class="btn btn-danger task-delete-user"> Eliminar </button>
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
                // console.log(nombre_rec);

                $('#taskId').val(t.id_rec);
                $('#nombre_rec').val(t.Nombre_rec);
                $('#notificacion_rec').val(t.Notificacion_rec);
                $('#color_rec').val(t.Color_rec);
                // console.log(response);
                edit = true;
            });
        });
    });

    // ------------------------------------------------------------------------------------------------------------- //

    $(document).on('click', '.task-delete-user', function (){
        Swal.fire({
            title: '¿Estas Seguro?',
            text: "Se borrara tu recordatorio ¡Y no podras recuperarlo! D:",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#1363DF',
            cancelButtonColor: '#47B5FF',
            confirmButtonText: '¡Sé lo que hago!',
          }).then((result) => {
                if (result.isConfirmed) {
                    let element = $(this)[0].parentElement;
                    let id_rec = $(element).attr('taskId-del');
                    $.post('TaskController.php?action=DeleteTask', {id_rec}, function(response){ /* console.log(response); */ });
                    
                    Swal.fire(
                        '¡Poof!',
                        'Tu recordatorio Ha Sido Eliminado',
                        'success'
                    )
                }
          })
    });

    // ------------------------------------------------------------------------------------------------------------- //

    setInterval(fetchTasks, 250);
    // fetchTasks();
});



// ----------------------------------- FULL CALENDAR ----------------------------------- //
var myModal = new bootstrap.Modal(document.getElementById('modal-c'))
var form_insertar = document.getElementById('form-c');

document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');
    var calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: 'dayGridMonth',
        locale: 'es', // Definimos el idioma.
        headerToolbar : { 
            left: 'prev, next, today', // Organizacion de los elementos (Lado Izquierdo).
            center: 'title',
            right: 'dayGridMonth, timeGridWeek, listWeek'
        },
        events: 'CalendarController.php?action=GetEvents',
        dateClick: function(info){
            console.log(info);
            
            document.getElementById('start').value = info.dateStr;
            document.getElementById('btnEliminar').classList.add('d-none');
            document.getElementById('btnAccion').textContent = "Guardar";
            
            document.getElementById('titulo').textContent = "Agregar Evento";
            myModal.show();

            form_insertar.addEventListener('submit', function(e){
                e.preventDefault();
        
                const nombre_evn = document.getElementById('nombre_evn').value;
                const color_evn = document.getElementById('color_evn').value;
                const fecha_evn = document.getElementById('start').value;
        
                if(nombre_evn == '' || color_evn == '' || fecha_evn == ''){
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
            })
        
            $(document).ready(function() {
                console.log("Entre A -> Crear Evento");
                // console.log("ID -> ", $('#id_evn').val())
                $('#form-c').submit(function(er){
                    const postData = {
                        id_evn: $('#id_evn').val(),
                        nombre_evn: $('#nombre_evn').val(),
                        descripcion_evn: $('#descripcion_evn').val(),
                        color_evn: $('#color_evn').val(),
    
                        desde_evn: $('#start').val(),
                        hasta_evn: $('#end').val(),
    
                        hora_inicio_evn: $('#time').val(),
                        hora_final_evn: $('#timeend').val(),
                    }
            
                    let url ='CalendarController.php?action=Event';
    
                    let random = Math.random() * 100;
                    let random_r = Math.round(random);
                    // let random_r = 4;
    
                    $.post(url, postData, function(response){
                        if(response == 'event success' && random_r >  4){
                            let timerInterval
                            Swal.fire({
                                title: 'Evento Agregado Correctamente',
                                timer: 2000,
                                icon: 'success',
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
    
                        if(response == 'event success' && random_r <= 4){
                            Swal.fire({
                                title: 'Evento Agregado Correctamente',
                                width: 600,
                                padding: '3em',
                                color: '#716add',
                                backdrop: `
                                    rgba(0,0,123,0.4)
                                    url("../Public/Img/User/neon-cat-rainbow.gif")
                                    center top
                                    no-repeat
                                `
                            })
                        }
    
                        myModal.hide();
                        calendar.refetchEvents();
    
                        console.log("RESPUESTA -> ", response);
                    })
                    
    
                    $('#form-c').trigger('reset');
                    er.preventDefault();
                });
            });  
        },

        eventClick : function(i){
            // console.log("Informacion -> ", i);
            document.getElementById('id_evn').value = i.event.id;
            const id_evn = document.getElementById('id_evn').value;

            document.getElementById('btnEliminar').classList.remove('d-none');
            document.getElementById('btnAccion').textContent = "Actualizar";
            document.getElementById('titulo').textContent = "Actualizar Evento";

            $.ajax({
                url: 'CalendarController.php?action=GetAllEvents&id_evn=' + id_evn,
                type: 'GET',
                success: function(response){
                    console.log(response);
                    let event = JSON.parse(response);

                    event.forEach(e => {
                        document.getElementById("id_evn").value = e.id_evn;
                        document.getElementById("nombre_evn").value = e.nombre_evn;
                        document.getElementById("descripcion_evn").value = e.descripcion_evn;
                        document.getElementById("color_evn").value = e.color_evn;
                        document.getElementById("start").value = e.desde_evn;
                        document.getElementById("time").value = e.hora_inicio_evn;
                        document.getElementById("end").value = e.hasta_evn;
                        document.getElementById("timeend").value = e.hora_final_evn;
                    });
                    
                    console.log("ID -> ", $('#id_evn').val())
                    myModal.show();
                }
            });
                
            calendar.refetchEvents();
            myModal.show();
        }
    })

    calendar.render();
});
