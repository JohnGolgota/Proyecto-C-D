$(function(){
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
                            <div class="">
                                <h5 style="color: black;">${query.id_usr} | ${query.nombre_usr} | ${query.correo_usr} </h5><h5 class="type"> en usuarios. </h5>
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
                            <div class="">
                                <h5 style="color: black;">${event.id_evn} | ${event.nombre_evn} | ${event.descripcion_evn} | ${event.id_usr} </h5><h5 class="type"> en eventos. </h5>
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
                // console.log("ESTA ES LA RESPUESTA -> ", response);

                let tasks = JSON.parse(response);
                let template_tasks = '';
                tasks.forEach(task => {
                        template_tasks += 
                        `
                            <div class="">
                                <h5 style="color: black;">${task.id_rec} | ${task.nombre_rec} | ${task.id_usr}</h5><h5 class="type"> en recordatorios. </h5>
                            </div>
                        `
                    });
                    
                    // Pintamos la plantilla en el elemento seleccionado.
                    $('#resultados-tasks').html(template_tasks);
                }
        });

        $.ajax({
            url: 'AdminController.php?action=Archives',
            type: 'POST', // GET es para recibir informacion, POST para enviar.
            data: {search},
            success: function(response){
                // console.log("ESTA ES LA RESPUESTA -> ", response);

                let archives = JSON.parse(response);
                let template_archive = '';
                archives.forEach(archive => {
                        template_archive += 
                        `
                            <div class="">
                                <h5 style="color: black;">${archive.id_arc} | ${archive.nombre_arc} | ${archive.id_usr}</h5><h5 class="type"> en archivo. </h5>
                            </div>
                        `
                    });
                    
                    // Pintamos la plantilla en el elemento seleccionado.
                    $('#resultados-archivo').html(template_archive);
                }
        });

        $.ajax({
            url: 'AdminController.php?action=Pomodoros',
            type: 'POST', // GET es para recibir informacion, POST para enviar.
            data: {search},
            success: function(response){
                // console.log("ESTA ES LA RESPUESTA -> ", response);

                let pomodoros = JSON.parse(response);
                let template_pomodoro = '';
                pomodoros.forEach(pomodoro => {
                        template_pomodoro += 
                        `
                            <div class="">
                                <h5 style="color: black;">${pomodoro.id_pmd} | ${pomodoro.evento_pmd} | ${pomodoro.id_usr}</h5><h5 class="type"> en pomodoro. </h5>
                            </div>
                        `
                    });
                    
                    // Pintamos la plantilla en el elemento seleccionado.
                    $('#resultados-pomodoro').html(template_pomodoro);
                }
        });
    });
})

