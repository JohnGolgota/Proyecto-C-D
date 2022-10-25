// ----------------------------------- CONTENIDO AJAX y Jquery. ----------------------------------- //
$(document).ready(function() {
    let edit = false;  
    $('#formulario-registro').submit(function(e){
        const postData = {
            usuario: $('#usuarioRE').val(),
            contrasenaU: $('#usuarioRC').val(),
            contrasenaUC: $('#usuarioRCC').val(),
            terminosCU: $('#terminosycondiciones').val()
        }
        console.log(postData)

        $('#formulario-registro').trigger('reset');


        e.preventDefault();
        edit = false;
    });
    setInterval(fetchTasks, 250);
});