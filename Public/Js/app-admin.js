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

    $('#search').keyup(function(){
        let search = $('#search').val();
        // console.log(search);

        $.ajax({
            url: 'AdminController.php?action=Query',
            type: 'POST', // GET es para recibir informacion, POST para enviar.
            data: {search},
            
            // Cuando reciba la respuesta se va a ejecutar cierta funcion:
            success: function(response){
                console.log("ESTA ES LA RESPUESTA -> ", response);

                let querys = JSON.parse(response);
                let template = '';
                querys.forEach(query => {

                    // console.log("TASK -> ", task.Nombre_rec);

                        // Llenamos la Plantilla.
                        template += 
                        `
                            <div class="">
                                <h1 style="color: black;">${query.nombre_usr}</h1>
                            </div>
                        `
                    });
                    
                    // Pintamos la plantilla en el elemento seleccionado.
                    $('#resultados').html(template);
                }
        });
    });
})