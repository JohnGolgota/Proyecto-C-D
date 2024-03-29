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

let rec = document.getElementById("rec-desplegable");
rec.addEventListener('click', function(){
    document.getElementById("configDesplegable").style.display = "none";
});

let cal = document.getElementById("cal-desplegable");
cal.addEventListener('click', function(){
    document.getElementById("configDesplegable").style.display = "none";
});

let pom = document.getElementById("pom-desplegable");
pom.addEventListener('click', function(){
    document.getElementById("configDesplegable").style.display = "none";
});



// ----------------------------------- CONTENIDO AJAX y Jquery. ----------------------------------- //
// [ACTUALIZAR CONTRASEÑA] --------------------------------------------------------------------------- //
$('#form-password').submit(function (er) {
    const postData = {
        old_password_usr: $('#old_password_usr').val(),
        new_password_usr: $('#new_password_usr').val(),
        confirm_password_usr: $('#confirm_password_usr').val()
    }

    let url = 'UserController.php?action=act_contrasena';

    $.post(url, postData, function (response) {
        // console.log(response);
        switch (response) {
            case "empty":
                Swal.fire({
                    icon: 'error',
                    title: '¡Nao Nao!',
                    text: '¡Los campos NO pueden estar vacios!',
                    confirmButtonText: '¡Vale!'
                })
                break;
                
            case "not":
                Swal.fire({
                    icon: 'error',
                    title: '¡Nao Nao!',
                    text: '¡Las contraseñas NO coinciden!',
                    confirmButtonText: '¡Vale!'
                })
                break;

            case "four":
                Swal.fire({
                    icon: 'error',
                    title: '¡Nao Nao!',
                    text: '¡La contraseña debe tener al menos 4 caracteres!',
                    confirmButtonText: '¡Vale!'
                })
                break;

            case "ten":
                Swal.fire({
                    icon: 'error',
                    title: '¡Nao Nao!',
                    text: '¡La contraseña NO puede tener mas de 10 caracteres!',
                    confirmButtonText: '¡Vale!'
                })
                break;
                
            case "minus":
                Swal.fire({
                    icon: 'error',
                    title: '¡Nao Nao!',
                    text: '¡La contraseña debe tener al menos una letra minuscula!',
                    confirmButtonText: '¡Vale!'
                })
                break;

            case "number":
                Swal.fire({
                    icon: 'error',
                    title: '¡Nao Nao!',
                    text: '¡La contraseña debe tener al menos un numero!',
                    confirmButtonText: '¡Vale!'
                })
                break;

            case "incorrect":
                Swal.fire({
                    icon: 'error',
                    title: '¡Nao Nao!',
                    text: '¡Contraseña Incorrecta!',
                    confirmButtonText: '¡Vale!'
                })
                break;

            case "not found":
                Swal.fire({
                    icon: 'error',
                    title: '¡Nao Nao!',
                    text: '¡Ha ocurrido un error al actualizar los datos! D:',
                    confirmButtonText: '¡Vale!'
                })
                break;
            
            case "success":
                Swal.fire({
                    icon: 'success',
                    title: '¡Genial!',
                    text: '¡Los datos han sido actualizados correctamente!',
                    confirmButtonText: '¡Vale!'
                })

                setTimeout(function(){
                    window.location.reload();
                }, 1250);

                break;

            default:
                break;
        }
    });

    er.preventDefault();
});



// [ACTUALIZAR USUARIO] --------------------------------------------------------------------------- //
$('#form-actualizar').submit(function (er) {
    const postData = {
        nombre_usr: $('#nombre_usr').val(),
        correo_usr: $('#correo_usr').val(),
        contrasena_usr: $('#contrasena_usr').val(),
    }

    let url = 'UserController.php?action=actualizar';

    $.post(url, postData, function (response) {
        // // console.log("RESPUESTA -> ", response);
        // // console.log("Formularios de M*r",$('#nombre_usr').val(), $('#correo_usr').val(), $('#contrasena_usr').val())
        switch (response) {
            case "pass empty":
                Swal.fire({
                    icon: 'error',
                    title: '¡Nao Nao!',
                    text: '¡La contraseña NO puede estar vacia!',
                    confirmButtonText: '¡Vale!'
                })
                break;
                
            case "exist":
                Swal.fire({
                    icon: 'error',
                    title: '¡Nao Nao!',
                    text: 'Ese correo electronico ya existe',
                    confirmButtonText: '¡Vale!'
                })
                break;

            case "pass error":
                Swal.fire({
                    icon: 'error',
                    title: '¡Nao Nao!',
                    text: '¡Contraseña Incorrecta!',
                    confirmButtonText: '¡Vale!'
                })
                break;

            case "length":
                Swal.fire({
                    icon: 'error',
                    title: '¡Nao Nao!',
                    text: '¡El nombre de usuario debe tener al menos 4 caracteres y maximo 10!',
                    confirmButtonText: '¡Vale!'
                })
                break;
                
            case "true":
                Swal.fire({
                    icon: 'success',
                    title: '¡Genial!',
                    text: '¡Los datos han sido actualizados correctamente!',
                    confirmButtonText: '¡Vale!'
                })

                if(!$('#nombre_usr').val() == ""){
                    $('#nombre_readonly').val($('#nombre_usr').val());
                }

                if(!$('#correo_usr').val() == ""){
                    // break;
                    $('#correo_readonly').val($('#correo_usr').val());
                }

                setTimeout(function(){
                    window.location.reload();
                }, 1250);
                
                break;

            default:
                break;
        }
    });

    er.preventDefault();
    // $('#form-actualizar').trigger('reset');
});

// [TASKS] ---------------------------------------------------------------------------------------------------- //
$(document).ready(function() {
    fetchArchive();
    fetchTasks();
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

        let nott = new Date($('#notificacion_rec').val()); 
        let noww = new Date();

        noww_unix = noww.getTime();
        nott_unix = nott.getTime();
        
        if(nott_unix < noww_unix){
            Swal.fire({
                icon: 'error',
                title: '¡Nao Nao!',
                text: 'Esa fecha ya paso ¡No puedes agregar un recordatorio allí!',
                confirmButtonText: '¡Vale!'
            })
        } else {
            // Enviar informacion (Donde queremos enviar el dato, Que datos se envian, que se hace cuando reciba respuesta)
            $.post(url, postData, function(response){
                // console.log(response);
            })

            if(edit == true){
                let timerInterval
                Swal.fire({
                    title: 'Recordatorio Actualizado Correctamente',
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
            } else {
                let timerInterval
                Swal.fire({
                    title: 'Recordatorio Agregado Correctamente',
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
        }

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
                // // console.log("ESTA ES LA RESPUESTA -> ", response);

                let tasks = JSON.parse(response);
                let template = '';
                tasks.forEach(task => {

                    // // console.log("TASK -> ", task.Nombre_rec);

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

    function fetchArchive(){
        // Pedimos informacion para mostrarla en lista. Como no se especifica el momento (como en los de arriba), se ejecuta siempre.
        $.ajax({
            url: 'ArchiveController.php?action=GetArchives',
            type: 'GET',
            success: function(response){
                // // console.log("ESTA ES LA RESPUESTA -> ", response);

                let archives = JSON.parse(response);
                let template = '';
                archives.forEach(archive => {

                    // // console.log("TASK -> ", task.Nombre_rec);

                        // Llenamos la Plantilla.
                        template += 
                        `
                            <div class="tasks">
                                <div class="task my-auto d-flex mb-1" style="background-color:${archive.color_arc};">
                                    <h5 class="element-task nombre-task my-auto" id="">${archive.nombre_arc} | </h5>
                                    <h5 class="element-task notifiacion-task my-auto" id=""> ${archive.notificacion_arc} </h5>
                                </div>
                            </div>
                        `
                    });
                    
                    // Pintamos la plantilla en el elemento seleccionado.
                    $('#archive').html(template);
                }
        });
    }

    // ----------------------------------------------- PREPARAR EL ACTUALIZAR ------------------------------------------------------- //

    $(document).on('click', '#nombre-task', function(e){
        let element = $(this).next().next();
        let id_rec = $(element).attr('taskId-del');

        // // console.log(element);
        // // console.log(id_rec);

        $.post('TaskController.php?action=GetTask', {id_rec}, function(response){
            // console.log(response);
            let task = JSON.parse(response);
            task.forEach(t => {
                // // console.log(t);
                // // console.log(nombre_rec);

                $('#taskId').val(t.id_rec);
                $('#nombre_rec').val(t.Nombre_rec);
                $('#notificacion_rec').val(t.Notificacion_rec);
                $('#color_rec').val(t.Color_rec);
                // // console.log(response);
                edit = true;
            });
        });

        fetchTasks();
    });

    // ------------------------------------------------------------------------------------------------------------- //

    $(document).on('click', '.task-delete-user', function (){
        Swal.fire({
            title: '¿Estas Seguro?',
            text: "Se borrara tu recordatorio ¡Si lo haces, Solo podras verlo desde los recordatorios archivados en el menu principal!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#1363DF',
            cancelButtonColor: '#47B5FF',
            confirmButtonText: '¡Sé lo que hago!',
            cancelButtonText: 'Cancelar',
          }).then((result) => {
                if (result.isConfirmed) {
                    let element = $(this)[0].parentElement;
                    let id_rec = $(element).attr('taskId-del');
                    $.post('TaskController.php?action=DeleteTask', {id_rec}, function(response){ /* // console.log(response); */ });
                    
                    Swal.fire(
                        '¡Poof!',
                        'Tu recordatorio Ha Sido Eliminado',
                        'success'
                    )
                }

                fetchTasks();
                fetchArchive();
          })
    });

    // ------------------------------------------------------------------------------------------------------------- //


    fetchArchive();
    fetchTasks();


    // ------------------------------------------------------------------------------------------------------------- //
                                                    // NOTIFICACIONES // 
    // ------------------------------------------------------------------------------------------------------------- //
    function notTasks(){
        // // console.log("Me he ejecutaado");
        $.ajax({
            url: 'TaskController.php?action=GetTasks',
            type: 'GET',
            success: function(response){
                let tasks = JSON.parse(response);
                
                tasks.forEach(task => {
                    let not = new Date(task.Notificacion_rec); 
                    let now = new Date();

                    now_unix = now.getTime(); // 1667149980000
                    not_unix = not.getTime(); // 1667149980000

                    if(now_unix >= not_unix){
                        const not_mp3 = new Audio('../Public/Snd/not.mp3');
                        not_mp3.play();

                        Swal.fire({
                            icon: 'info',
                            width: 700,
                            title: '¡Es hora de <p class="texto-recordatorio" style="color:'+task.Color_rec+';">' + task.Nombre_rec + '</p>!',
                            text: 'El recordatorio ha sido archivado ¡Puedes ver todos los recordatorios archivados desde el menu principal!',
                            confirmButtonText: '¡Vale!'
                        })

                        let id_rec = task.id_rec;
                        $.post('TaskController.php?action=DeleteTask', {id_rec}, function(response){});

                        fetchTasks();
                        fetchArchive();
                    }
                }
            )}
        });    
    }

    setInterval(notTasks, 1000);
});



// ----------------------------------- FULL CALENDAR ----------------------------------- //
var myModal = new bootstrap.Modal(document.getElementById('modal-c'))
var form_insertar = document.getElementById('form-c');
let eliminar = document.getElementById("btnEliminar");

document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');
    var calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: 'dayGridMonth',
        locale: 'es', // Definimos el idioma.
        headerToolbar : { 
            left: 'prev next today', // Organizacion de los elementos (Lado Izquierdo).
            center: 'title',
            right: 'dayGridMonth timeGridWeek listWeek'
        },
        events: 'CalendarController.php?action=GetEvents',
        editable: true,
        dateClick: function(info){
            // console.log("Date Click");
            
            document.getElementById('start').value = info.dateStr;
            eliminar.classList.add('d-none');
            document.getElementById('btnAccion').textContent = "Guardar";
            
            document.getElementById('titulo').textContent = "Agregar Evento";
            document.getElementById('btnPomodoro').style.display = "none";
            myModal.show();
            
            $(document).ready(function() {
                $('#form-c').submit(function(er){
                    // console.log("Cree Evento");
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

                    let nombre_evn = document.getElementById('nombre_evn').value;
                    // // console.log("ANTES DE ENTRAR AL CONDICIONAL -> ", nombre_evn);

                    if(nombre_evn.length > 0){
                        // console.log("Agregare Un Evento");
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

                            if(response == 'update success' && random_r >  4){
                                let timerInterval
                                Swal.fire({
                                    title: 'Evento Actualizado Correctamente',
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

                            if(response == 'update success' && random_r <= 4){
                                Swal.fire({
                                    title: 'Evento Actualizado Correctamente',
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

                            // console.log("RESPUESTA -> ", response);
                            $('#form-c').trigger('reset');

                            calendar.refetchEvents();
                            myModal.hide();
                        })
                    } else {
                        // console.log("NO VOY A AGREGAR NADA -> ", nombre_evn);
                    }
                    
                    $('#form-c').trigger('reset');
                    er.preventDefault();
                    calendar.refetchEvents();
                });
            });
            
        },

        eventClick : function(i){
            // // console.log("Informacion -> ", i);
            document.getElementById('id_evn').value = i.event.id;
            const id_evn = document.getElementById('id_evn').value;

            eliminar.classList.remove('d-none');
            document.getElementById('btnAccion').textContent = "Actualizar";
            document.getElementById('titulo').textContent = "Actualizar Evento";
            document.getElementById('btnPomodoro').style.display = "block";

            $.ajax({
                url: 'CalendarController.php?action=GetAllEvents',
                type: 'GET',
                data: {
                    'id_evn': id_evn
                },
                success: function(response){
                    // console.log(response);
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
                    
                    // console.log("ID -> ", $('#id_evn').val())
                    myModal.show();
                }
            });

            
            // myModal.show();               
        },

        eventDrop: function(info){
            const id_evn = info.event.id;
            const start_evn = info.event.startStr;

            // console.log(id_evn, start);

            $.ajax({
                url: 'CalendarController.php?action=DropEvent',
                type: 'GET',
                data: {
                    'id_evn': id_evn,
                    'start_evn': start_evn
                },
                
                // Cuando reciba la respuesta se va a ejecutar cierta funcion:
                success: function(response){
                    // console.log("RESPUESTA -> ", response);
                }

            });
            
        }

    })
    calendar.render();

    eliminar.addEventListener('click', function(){
        Swal.fire({
            title: '¿Estas Seguro?',
            text: "Se borrara el evento ¡Y no podras recuperarlo! D:",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#1363DF',
            cancelButtonColor: '#47B5FF',
            confirmButtonText: '¡Sé lo que hago!',
            cancelButtonText: 'Cancelar',
          }).then((result) => {
                if (result.isConfirmed) {
                    const id_evn = document.getElementById("id_evn").value;
                    $.post('CalendarController.php?action=DeleteEvent', {id_evn}, function(response){ 
                        // console.log(response); 
                    });
                    
                    Swal.fire(
                        '¡Poof!',
                        'Tu recordatorio Ha Sido Eliminado',
                        'success'

                    )
                    
                    $('#form-c').trigger('reset');
                    calendar.refetchEvents();
                    myModal.hide();
                }
          })
          $('#form-c').trigger('reset');
    });
    
});

// ------------------------------------------------------------------------------------------------------------- //
                                                    // ATAJOS DE TECLADO // 
// ------------------------------------------------------------------------------------------------------------- //
const modaltask = new bootstrap.Modal(document.getElementById('addreminder'));
const menu = document.getElementById('configDesplegable');

document.addEventListener('keydown', (event) => {
    if (event.shiftKey) {
       if (event.keyCode == 84) {
           if(modaltask.show()){
                modaltask.hide();
           } 
           if(modaltask.hide()) {
                modaltask.show();
           }
       }

       if(event.keyCode == 77){
            if(menu.style.display == "block"){
                menu.style.display = "none";
            } else {
                menu.style.display = "block";
            }  
        }
    }
}, false);



// ------------------------------------------------------------------------------------------------------------- //
                                                    // RELOJ POMODORO // 
// ------------------------------------------------------------------------------------------------------------- //

// DINAMISMO DEL POMODORO
const action_on = document.getElementById("customRange1");
action_on.addEventListener('click', function(){
    setInterval(() => {
        let value_input = document.getElementById("customRange1").value;
        let value_text = document.getElementById("first-label");
        value_text.innerText = value_input + " Minutos";
    }, 100);
})

const action_two = document.getElementById("customRange2");
action_two.addEventListener('click', function(){
    setInterval(() => {
        let value_input = document.getElementById("customRange2").value;
        let value_text = document.getElementById("second-label");
        value_text.innerText = value_input + " Minutos";
    }, 100)  
})

const action_three = document.getElementById("customRange3");
action_three.addEventListener('click', function(){
    setInterval(() => {
        let value_input = document.getElementById("customRange3").value;
        let value_text = document.getElementById("third-label");
        value_text.innerText = value_input + " Minutos";
    }, 100)  
})

let actividad_string;
let array_actividad;
let seconds;
let actividad;


// FUNCION POMODORO (JODIO EL ASUNTO)
const pomodoro_start = document.getElementById("btnPomodoro");
pomodoro_start.addEventListener('click', function(){
    myModal.hide();
    window.scrollTo(0,1000);

    let start_time = document.getElementById("time").value; 
    let end_time = document.getElementById("timeend").value; 

    let short_time = start_time.substring(0, 2);
    let short_end = end_time.substring(0, 2);

    parseFloat(short_time);
    parseFloat(short_end);

    // console.log(short_time);
    // console.log(short_end);

    let result = short_end - short_time;
    actividad = (((result * 77) / 100) / 4) * 60;
    let pausa_corta = (((result * 11.5) / 100) / 3) * 60;
    let pausa_larga = ((result * 11.5) / 100) * 60;
    
    document.getElementById("customRange1").value = actividad;
    document.getElementById("first-label").innerText = actividad.toFixed(0) + " Minutos";
    
    document.getElementById("customRange2").value = pausa_corta;
    document.getElementById("second-label").innerText = pausa_corta.toFixed(0) + " Minutos";
    
    document.getElementById("customRange3").value = pausa_larga;
    document.getElementById("third-label").innerText = pausa_larga.toFixed(0) + " Minutos";
    
    actividad_string = actividad.toString();
    array_actividad = actividad_string.split(".");
    // console.log("ARRAY DE ACTIVIDAD ", array_actividad);
    // console.log(array_actividad[0]);
    if(array_actividad[1] > 5){
        seconds = 59;
    } else {
        seconds = 00;
    }
    // document.getElementById('counter').innerText = array_actividad[0] + ":" + seconds;
})

$(document).ready(function() {
    $('#pomodoro-form').submit(function(e){    
        e.preventDefault();    
        if(document.getElementById("btn-continuar").textContent == "Comenzar"){
            const postData = {
                evento_pmd: $("#nombre_evn").val(),
                actividad_pmd: $("#customRange1").val(),
                pausa_corta_pmd: $("#customRange2").val(),
                pausa_larga_pmd: $("#customRange3").val()
            }

            $.post('PomodoroController.php?action=AddPomodoro', postData, function(response){
                // console.log(response);
            })

            document.getElementById("btn-continuar").textContent = "Detener";
            
            let time = $("#customRange1").val();
            let time_array = time.split(".");
            let seconds;
            
            let actividad = time_array[0];
            if(time_array[1] == undefined){
                seconds = 0;
            } else {
                seconds = 59;
            }
            
            let pausa_corta_time = $("#customRange2").val();
            let pausa_corta_array = pausa_corta_time.split(".");
            let seconds_pausa_corta;
            
            let pausa_corta = pausa_corta_array[0];
            if(pausa_corta_array[1] == undefined){
                seconds_pausa_corta = 0;
            } else {
                seconds_pausa_corta = 59;
            }

            function eliminar_interval(){
                const button = document.getElementById("btn-continuar");
                if(document.getElementById("btn-continuar").textContent == "Detener"){
                    button.addEventListener('click', function(){
                        clearInterval(actividad_pom_1);   
                    });
                }
            }

            function alt_function(){
                const button = document.getElementById("btn-continuar");
                if(document.getElementById("btn-continuar").textContent == "Detener"){
                    button.addEventListener('click', function(){
                        window.location.reload();
                    });
                }
            }
            
            // [PRIMER CICLO]
            var actividad_pom_1 = setInterval(() => {
                eliminar_interval();
                if(actividad == 00 && seconds == 0){
                    clearInterval(actividad_pom_1);
                    let not_mp3 = new Audio('../Public/Snd/not.mp3');
                    not_mp3.play();

                    Swal.fire({
                        icon: 'success',
                        title: '¡Genial!',
                        text: 'Tiempo de actividad completo ¡Tomate un descanso!',
                        confirmButtonText: '¡Vale!'
                    })
                    // console.log("FIN ACTIVIDAD 1");
                }

                if(seconds == -1){
                    seconds = 59;
                    actividad--;
                }
                
                if(actividad < 10 && seconds < 10){
                    document.getElementById("counter").innerText = "0" + actividad + ": 0" + seconds;
                    // // console.log("0", actividad, ": 0", seconds);
                } else if(actividad < 10){
                    document.getElementById("counter").innerText = "0" + actividad + ":" + seconds;
                    // // console.log("0", actividad, ":", seconds);
                } else if(seconds < 10){
                    document.getElementById("counter").innerText = "" + actividad + ": 0" + seconds;
                    // // console.log(actividad, ": 0", seconds);
                } else {
                    document.getElementById("counter").innerText = "" + actividad + ":" + seconds;
                    // // console.log(actividad, ":", seconds);
                }

                seconds--;
            }, 1000);
            
            setTimeout(() => {
                var pausa_pom_1 = setInterval(() => {
                    alt_function();
                    if(pausa_corta == 00 && seconds_pausa_corta == 0){
                        clearInterval(pausa_pom_1);
                        // console.log("FIN PAUSA 1");
                        let not_mp3 = new Audio('../Public/Snd/not.mp3');
                        not_mp3.play();

                        Swal.fire({
                            icon: 'info',
                            title: '¡Vamos!',
                            text: 'Descanso completado ¡A seguir trabajando!',
                            confirmButtonText: '¡Vale!'
                        })
                    }
        
                    if(seconds_pausa_corta == -1){
                        seconds_pausa_corta = 59;
                        pausa_corta--;
                    }
                    
                    if(pausa_corta < 10 && seconds_pausa_corta < 10){
                        document.getElementById("counter").innerText = "0" + pausa_corta + ": 0" + seconds_pausa_corta;
                        // // console.log("0", pausa_corta, ": 0", seconds_pausa_corta);
                    } else if(pausa_corta < 10){
                        document.getElementById("counter").innerText = "0" + pausa_corta + ":" + seconds_pausa_corta;
                        // // console.log("0", pausa_corta, ":", seconds_pausa_corta);
                    } else if(seconds_pausa_corta < 10){
                        document.getElementById("counter").innerText = pausa_corta + ": 0" + seconds_pausa_corta;
                        // // console.log(pausa_corta, ": 0", seconds_pausa_corta);
                    } else {
                        document.getElementById("counter").innerText = pausa_corta + ":" + seconds_pausa_corta;
                        // // console.log(pausa_corta, ":", seconds_pausa_corta);
                    }
        
                    seconds_pausa_corta--;
                }, 1000);
            }, (actividad * 60000) + 10000);

            // [SEGUNDO CICLO]
            let actividad_2 = time_array[0];
            let seconds_2
            if(time_array[1] == undefined){
                seconds_2 = 0;
            } else {
                seconds_2 = 59;
            }

            // console.log("ACTIVIDAD -> ", actividad_2);
            setTimeout(() => {
                var actividad_pom_2 = setInterval(() => {
                    alt_function();
                    if(actividad_2 == 00 && seconds_2 == 0){
                        clearInterval(actividad_pom_2);
                        // console.log("FIN ACTIVIDAD 2");
                        let not_mp3 = new Audio('../Public/Snd/not.mp3');
                        not_mp3.play();

                        Swal.fire({
                            icon: 'success',
                            title: '¡Genial!',
                            text: 'Tiempo de actividad completo ¡Tomate un descanso!',
                            confirmButtonText: '¡Vale!'
                        })
                    }
        
                    if(seconds_2 == -1){
                        seconds_2 = 59;
                        actividad_2--;
                    }
                    
                    if(actividad_2 < 10 && seconds_2 < 10){
                        document.getElementById("counter").innerText = "0" + actividad_2 + ": 0" + seconds_2;
                        // // console.log("0", actividad_2, ": 0", seconds_2);
                    } else if(actividad_2 < 10){
                        document.getElementById("counter").innerText = "0" + actividad_2 + ":" + seconds_2;
                        // // console.log("0", actividad_2, ":", seconds_2);
                    } else if(seconds_2 < 10){
                        document.getElementById("counter").innerText = actividad_2 + ": 0" + seconds_2;
                        // // console.log(actividad_2, ": 0", seconds_2);
                    } else {
                        document.getElementById("counter").innerText = actividad_2 + ":" + seconds_2;
                        // // console.log(actividad_2, ":", seconds_2);
                    }
                    
                    seconds_2--;
                }, 1000);
            }, ((actividad * 60000) + 10000) + ((pausa_corta * 60000) + 10000));

            let seconds_pausa_corta_2
            if(pausa_corta_array[1] == undefined){
                seconds_pausa_corta_2 = 0;
            } else {
                seconds_pausa_corta_2 = 59;
            }

            let pausa_corta_2 = pausa_corta_array[0];
            setTimeout(() => {
                var pausa_pom_2 = setInterval(() => {
                    alt_function();
                    if(pausa_corta_2 == 00 && seconds_pausa_corta_2 == 0){
                        clearInterval(pausa_pom_2);
                        // console.log("FIN PAUSA 2");
                        let not_mp3 = new Audio('../Public/Snd/not.mp3');
                        not_mp3.play(); 

                        Swal.fire({
                            icon: 'info',
                            title: '¡Vamos!',
                            text: 'Descanso completado ¡A seguir trabajando!',
                            confirmButtonText: '¡Vale!'
                        })
                    }
        
                    if(seconds_pausa_corta_2 == -1){
                        seconds_pausa_corta_2 = 59;
                        pausa_corta_2--;
                    }
                    
                    if(pausa_corta_2 < 10 && seconds_pausa_corta_2 < 10){
                        document.getElementById("counter").innerText = "0" + pausa_corta_2 + ": 0" + seconds_pausa_corta_2;
                        // // console.log("0", pausa_corta_2, ": 0", seconds_pausa_corta_2);
                    } else if(pausa_corta_2 < 10){
                        document.getElementById("counter").innerText = "0" + pausa_corta_2 + ":" + seconds_pausa_corta_2;
                        // // console.log("0", pausa_corta_2, ":", seconds_pausa_corta_2);
                    } else if(seconds_pausa_corta_2 < 10){
                        document.getElementById("counter").innerText = pausa_corta_2 + ": 0" + seconds_pausa_corta_2;
                        // // console.log(pausa_corta_2, ": 0", seconds_pausa_corta_2);
                    } else {
                        document.getElementById("counter").innerText = pausa_corta_2 + ":" + seconds_pausa_corta_2;
                        // // console.log(pausa_corta_2, ":", seconds_pausa_corta_2);
                    }
        
                    seconds_pausa_corta_2--;
                }, 1000);
            }, (((actividad * 60000) + 10000)*2) + ((pausa_corta * 60000) + 10000));

            // [TERCER CICLO]
            let actividad_3 = time_array[0];
            let seconds_3
            if(time_array[1] == undefined){
                seconds_3 = 0;
            } else {
                seconds_3 = 59;
            }

            // console.log("ACTIVIDAD -> ", actividad_3);
            setTimeout(() => {
                var actividad_pom_3 = setInterval(() => {
                    alt_function();
                    if(actividad_3 == 00 && seconds_3 == 0){
                        clearInterval(actividad_pom_3);
                        // console.log("FIN ACTIVIDAD 3");
                        let not_mp3 = new Audio('../Public/Snd/not.mp3');
                        not_mp3.play();

                        Swal.fire({
                            icon: 'success',
                            title: '¡Genial!',
                            text: 'Tiempo de actividad completo ¡Tomate un descanso!',
                            confirmButtonText: '¡Vale!'
                        })
                    }
        
                    if(seconds_3 == -1){
                        seconds_3 = 59;
                        actividad_3--;
                    }
                    
                    if(actividad_3 < 10 && seconds_3 < 10){
                        document.getElementById("counter").innerText = "0" + actividad_3 + ": 0" + seconds_3;
                        // // console.log("0", actividad_3, ": 0", seconds_3);
                    } else if(actividad_3 < 10){
                        document.getElementById("counter").innerText = "0" + actividad_3 + ":" + seconds_3;
                        // // console.log("0", actividad_3, ":", seconds_3);
                    } else if(seconds_3 < 10){
                        document.getElementById("counter").innerText = actividad_3 + ": 0" + seconds_3;
                        // // console.log(actividad_3, ": 0", seconds_3);
                    } else {
                        document.getElementById("counter").innerText = actividad_3 + ":" + seconds_3;
                        // // console.log(actividad_3, ":", seconds_3);
                    }
        
                    seconds_3--;
                }, 1000);
            }, (((actividad * 60000) + 10000)*2) + (((pausa_corta * 60000) + 10000)*2));

            let pausa_corta_3 = pausa_corta_array[0];
            let seconds_pausa_corta_3
            if(pausa_corta_array[1] == undefined){
                seconds_pausa_corta_3 = 0;
            } else {
                seconds_pausa_corta_3 = 59;
            }

            setTimeout(() => {
                var pausa_pom_3 = setInterval(() => {
                    alt_function();
                    if(pausa_corta_3 == 00 && seconds_pausa_corta_3 == 0){
                        clearInterval(pausa_pom_3);
                        // console.log("FIN PAUSA 3");
                        let not_mp3 = new Audio('../Public/Snd/not.mp3');
                        not_mp3.play();

                        Swal.fire({
                            icon: 'info',
                            title: '¡Vamos!',
                            text: 'Descanso completado ¡A seguir trabajando!',
                            confirmButtonText: '¡Vale!'
                        })
                    }
        
                    if(seconds_pausa_corta_3 == -1){
                        seconds_pausa_corta_3 = 59;
                        pausa_corta_3--;
                    }
                    
                    if(pausa_corta_3 < 10 && seconds_pausa_corta_3 < 10){
                        document.getElementById("counter").innerText = "0" + pausa_corta_3 + ": 0" + seconds_pausa_corta_3;
                        // // console.log("0", pausa_corta_3, ": 0", seconds_pausa_corta_3);
                    } else if(pausa_corta_3 < 10){
                        document.getElementById("counter").innerText = "0" + pausa_corta_3 + ":" + seconds_pausa_corta_3;
                        // // console.log("0", pausa_corta_3, ":", seconds_pausa_corta_3);
                    } else if(seconds_pausa_corta_3 < 10){
                        document.getElementById("counter").innerText = pausa_corta_3 + ": 0" + seconds_pausa_corta_3;
                        // // console.log(pausa_corta_3, ": 0", seconds_pausa_corta_3);
                    } else {
                        document.getElementById("counter").innerText = pausa_corta_3 + ":" + seconds_pausa_corta_3;
                        // // console.log(pausa_corta_3, ":", seconds_pausa_corta_3);
                    }
        
                    seconds_pausa_corta_3--;
                }, 1000);
            }, (((actividad * 60000) + 10000)*3) + (((pausa_corta * 60000) + 10000)*2));

            // [ULTIMO CICLO]
            let actividad_4 = time_array[0];
            let seconds_4
            if(time_array[1] == undefined){
                seconds_4 = 0;
            } else {
                seconds_4 = 59;
            }

            // console.log("ACTIVIDAD -> ", actividad_4);
            setTimeout(() => {
                var actividad_pom_4 = setInterval(() => {
                    alt_function();
                    if(actividad_4 == 00 && seconds_4 == 0){
                        clearInterval(actividad_pom_4);
                        // console.log("FIN ACTIVIDAD 4");
                        let not_mp3 = new Audio('../Public/Snd/not.mp3');
                        not_mp3.play();

                        Swal.fire({
                            icon: 'success',
                            title: '¡Genial!',
                            text: '¡Lo has conseguido! ¡Te mereces un graaaaaan descanso!',
                            confirmButtonText: '¡Vale!'
                        })
                    }
        
                    if(seconds_4 == -1){
                        seconds_4 = 59;
                        actividad_4--;
                    }
                    
                    if(actividad_4 < 10 && seconds_4 < 10){
                        document.getElementById("counter").innerText = "0" + actividad_4 + ": 0" + seconds_4;
                        // // console.log("0", actividad_4, ": 0", seconds_4);
                    } else if(actividad_4 < 10){
                        document.getElementById("counter").innerText = "0" + actividad_4 + ":" + seconds_4;
                        // // console.log("0", actividad_4, ":", seconds_4);
                    } else if(seconds_4 < 10){
                        document.getElementById("counter").innerText = actividad_4 + ": 0" + seconds_4;
                        // // console.log(actividad_4, ": 0", seconds_4);
                    } else {
                        document.getElementById("counter").innerText = actividad_4 + ":" + seconds_4;
                        // // console.log(actividad_4, ":", seconds_4);
                    }
        
                    seconds_4--;
                }, 1000);
            }, (((actividad * 60000) + 10000)*3) + (((pausa_corta * 60000) + 10000)*3));

            let pausa_larga_time = $("#customRange3").val();
            let pausa_larga_array = pausa_larga_time.split(".");
            let pausa_larga_seconds;
            let pausa_larga = pausa_larga_array[0];
            if(pausa_larga_array[1] == undefined){
                pausa_larga_seconds = 0;
            } else {
                pausa_larga_seconds = 59;
            }

            setTimeout(() => {
                var pausa_pom_4 = setInterval(() => {
                    alt_function();
                    if(pausa_larga == 00 && pausa_larga_seconds == 0){
                        clearInterval(pausa_pom_4);
                        // console.log("FIN PAUSA LARGA");
                        let not_mp3 = new Audio('../Public/Snd/not.mp3');
                        not_mp3.play();

                        Swal.fire({
                            icon: 'info',
                            title: '¡Vamos!',
                            text: 'Lo has conseguido, ¡FELICIDADES!',
                            confirmButtonText: '¡Vale!'
                        })
                    }
        
                    if(pausa_larga_seconds == -1){
                        pausa_larga_seconds = 59;
                        pausa_larga--;
                    }
                    
                    if(pausa_larga < 10 && pausa_larga_seconds < 10){
                        document.getElementById("counter").innerText = "0" + pausa_larga + ": 0" + pausa_larga_seconds;
                        // // console.log("0", pausa_larga, ": 0", pausa_larga_seconds);
                    } else if(pausa_larga < 10){
                        document.getElementById("counter").innerText = "0" + pausa_larga + ":" + pausa_larga_seconds;
                        // // console.log("0", pausa_larga, ":", pausa_larga_seconds);
                    } else if(pausa_larga_seconds < 10){
                        document.getElementById("counter").innerText = pausa_larga + ": 0" + pausa_larga_seconds;
                        // // console.log(pausa_larga, ": 0", pausa_larga_seconds);
                    } else {
                        document.getElementById("counter").innerText = pausa_larga + ":" + pausa_larga_seconds;
                        // // console.log(pausa_larga, ":", pausa_larga_seconds);
                    }
        
                    pausa_larga_seconds--;
                }, 1000);
            }, (((actividad * 60000) + 10000)*4) + (((pausa_corta * 60000) + 10000)*3));
        } else {
            document.getElementById("btn-continuar").textContent = "Comenzar";
            document.getElementById("counter").innerText = "00:00";
        }
    })
});