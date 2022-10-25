// ----------------------------------- CONTENIDO AJAX y Jquery. ----------------------------------- //
$(document).ready(function() {
    let edit = false;  
    // Seleccionamos el formulario. Capturaremos su evento 'submit', que manejaremos con una funcion. 
    // 'e' es la informacion del evento, que la necesitamos para modificar el comportamiento por defecto del form.
    $('#formulario-registro').submit(function(e){
        // Vamos a crear un objeto que se encarge de almacenar los valores de los inputs. Que es lo que enviaremos al servidor.
        const postData = {
            usuario: $('#usuarioRE').val(),
            contrasenaU: $('#usuarioRC').val(),
            contrasenaUC: $('#UsuarioRCC').val(),
            terminosCU: $('#terminosycondiciones').val()
        }

        let url = edit === false ? 'TaskController.php?holi=si' : 'TaskController.php?holi=no';

        // Enviar informacion (Donde queremos enviar el dato, Que datos se envian, que se hace cuando reciba respuesta)
        $.post(url, postData, function(response){ 
            console.log("Donde me envie -> ", url, " Que recibi -> ", e);
            // console.log("ELEMENT  ->" , element);
            console.log("NOMBRE ->" , usuario);
            console.log("RESPUESTA DEL SERVIDOR -> ", response);
        })

        // Reseteamos el formulario.
        $('#formulario-registro').trigger('reset');
        fetchTasks();

        // Cancelamos el comportamiento por defecto del form.
        e.preventDefault();
        edit = false;
    });

    // ------------------------------------------------------------------------------------------------------------- //

    // function fetchTasks(){
    //     // Pedimos informacion para mostrarla en lista. Como no se especifica el momento (como en los de arriba), se ejecuta siempre.
    //     $.ajax({
    //         url: 'TaskController.php?action=GetTasks',
    //         type: 'GET', // GET es para recibir informacion, POST para enviar.
    //         data: {'hola': 'hola'},
            
    //         // Cuando reciba la respuesta se va a ejecutar cierta funcion:
    //         success: function(response){
    //             // console.log("ESTA ES LA RESPUESTA -> ", response);

    //             let tasks = JSON.parse(response);
    //             let template = '';
    //             tasks.forEach(task => {

    //                 // console.log("TASK -> ", task.Nombre_rec);

    //                     // Llenamos la Plantilla.
    //                     template += 
    //                     `
    //                         <div class="tasks">
    //                             <div class="task my-auto d-flex mb-1" style="background-color:${task.Color_rec};">
    //                                 <h5 class="element-task nombre-task my-auto" id="nombre-task">${task.Nombre_rec} | </h5>
    //                                 <h5 class="element-task notifiacion-task my-auto" id="notificacion-task">${task.Notificacion_rec}</h5>
    //                                 <div class="action-tasks" taskId-del="${task.id_rec}">
    //                                     <button class="btn btn-danger task-delete"> Eliminar </button>
    //                                 </div>
    //                             </div>
    //                         </div>
    //                     `
    //                 });
                    
    //                 // Pintamos la plantilla en el elemento seleccionado.
    //                 $('#tasks').html(template);
    //             }
    //         });
    //     }

    // ------------------------------------------------------------------------------------------------------------- //

    // $(document).on('click', '#nombre-task', function(e){
    //     let element = $(this).next().next();
    //     let id_rec = $(element).attr('taskId-del');

    //     // console.log(element);
    //     // console.log(id_rec);

    //     $.post('TaskController.php?action=GetTask', {id_rec}, function(response){
    //         let task = JSON.parse(response);
    //         task.forEach(t => {
    //             // console.log(t);
    //             console.log(nombre_rec);

    //             $('#taskId').val(t.id_rec);
    //             $('#nombre_rec').val(t.Nombre_rec);
    //             $('#notificacion_rec').val(t.Notificacion_rec);
    //             $('#color_rec').val(t.Color_rec);
    //             console.log(response);
    //             edit = true;
    //         });
    //     });
    // });

    // ------------------------------------------------------------------------------------------------------------- //

    // $(document).on('click', '.task-delete', function (){
    //     swal({
    //         title: "¿Estas Seguro?",
    //         text: "Se borrara tu recordatorio, ¡no podras recuperarlo!",
    //         icon: "warning",
    //         buttons: true,
    //         dangerMode: true,
    //     })
    //     .then((willDelete) => {
    //         if (willDelete) {
    //             let element = $(this)[0].parentElement;
    //             let id_rec = $(element).attr('taskId-del');
    //             $.post('TaskController.php?action=DeleteTask', {id_rec}, function(response){ /* console.log(response); */ });
    
    //             swal('¡Poof! Tu recordatorio ha sido eliminado', {
    //                 icon: "success",
    //             });
    
    //         } else {
    //             swal("¡Vale!");
    //         }
    //     });
    // });

    // ------------------------------------------------------------------------------------------------------------- //

    setInterval(fetchTasks, 250);
    // fetchTasks();
});