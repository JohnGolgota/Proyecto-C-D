// ----------------------------------- MENU DESPLEGABLE ----------------------------------- //
function configDesplegable(){
    if(document.getElementById("configDesplegable").style.display == "none"){
        document.getElementById("configDesplegable").style.display = "block";
    }
    else {
        document.getElementById("configDesplegable").style.display = "none";
    }
}

$(function(){
    console.log("Jquery sirve");

    $('#form-query').submit(function(e){
        e.preventDefault();
        let search = $('#search').val();
        // console.log(search);

        $.ajax({
            url: 'AdminController.php?action=Query',
            type: 'POST', // GET es para recibir informacion, POST para enviar.
            data: {search},
            
            // Cuando reciba la respuesta se va a ejecutar cierta funcion:
            success: function(response){
                // console.log("ESTA ES LA RESPUESTA -> ", response);

                let querys = JSON.parse(response);
                let template = '';
                querys.forEach(query => {

                    // console.log("TASK -> ", task.Nombre_rec);

                        // Llenamos la Plantilla.
                        template += 
                        `
                            <div class="mt-3">
                                <h5 style="color: black;">${query.id_usr} | ${query.nombre_usr} | ${query.correo_usr}</h5>
                            </div>
                        `
                    });
                    
                    // Pintamos la plantilla en el elemento seleccionado.
                    $('#resultados-usuarios').html(template);
                }
        });

        $.ajax({
            url: 'AdminController.php?action=Events',
            type: 'POST', // GET es para recibir informacion, POST para enviar.
            data: {search},
            success: function(response){
                // console.log("ESTA ES LA RESPUESTA -> ", response);

                let events = JSON.parse(response);
                let template_events = '';
                events.forEach(event => {
                        template_events += 
                        `
                            <div class="mt-3">
                                <h5 style="color: black;">${event.id_evn} | ${event.nombre_evn} | ${event.descripcion_evn} | ${event.id_usr}</h5>
                            </div>
                        `
                    });
                    
                    // Pintamos la plantilla en el elemento seleccionado.
                    $('#resultados-eventos').html(template_events);
                }
        });

        $.ajax({
            url: 'AdminController.php?action=Tasks',
            type: 'POST', // GET es para recibir informacion, POST para enviar.
            data: {search},
            success: function(response){
                console.log("ESTA ES LA RESPUESTA -> ", response);

                let tasks = JSON.parse(response);
                let template_tasks = '';
                tasks.forEach(task => {
                        template_events += 
                        `
                            <div class="mt-3">
                                <h5 style="color: black;">${event.id_evn} | ${event.nombre_evn} | ${event.descripcion_evn} | ${event.id_usr}</h5>
                            </div>
                        `
                    });
                    
                    // Pintamos la plantilla en el elemento seleccionado.
                    $('#resultados-tasks').html(template_events);
                }
        });
    });
})