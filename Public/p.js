const postData = {
    usuarioRE: $('#usuarioRE').val(),
    usuarioRC: $('#usuarioRC').val(),
    usuarioRCC: $('#usuarioRCC').val(),
    terminosycondiciones: $('#terminosycondiciones').val()
}
console.log(postData)
let url = "./Controllers/UserController.php?action=ajax-registro"

$.post(url, postData, function(response) {
    console.log("Donde me envie -> ", url, " Que recibi -> ", e);
    console.log("NOMBRE ->", usuarioRE);
    console.log("RESPUESTA DEL SERVIDOR -> ", response);

    if (response == "Correo no valido.") {
        let timerInterval
        Swal.fire({
            title: 'Por favor introduzca un correo electronico valido.',
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
    if (response == "Correo en uso.") {
        let timerInterval
        Swal.fire({
            title: 'El correo ya ha sido registrado.',
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
        })
    }
    if (response == "Las contrasenas no coinciden.") {
        let timerInterval
        Swal.fire({
            title: 'Las contraseñas no coinciden.',
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
        })
    }
    if (response == "minimo 4 caracteres.") {
        let timerInterval
        Swal.fire({
            title: 'La contraseña debe tener al menos 4 caracteres.',
            timer: 2500,
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
        })
    }
    if (response == "maximo 10 caracteres.") {
        let timerInterval
        Swal.fire({
            title: 'La contraseña no debe tener mas de 10 caracteres.',
            timer: 2500,
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
        })
    }
    if (response == "una letra minuscula.") {
        let timerInterval
        Swal.fire({
            title: 'La contraseña debe tener almenos una letra minuscula.',
            timer: 2500,
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
        })
    }
    if (response == "un numero.") {
        let timerInterval
        Swal.fire({
            title: 'La contraseña debe tener almenos un numero.',
            timer: 2500,
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
        })
    }
    if (response == "success") {
        window.location.assign('./Controllers/UserController.php?action=inicio');
    }
})

$('#formulario-registro').trigger('reset');


e.preventDefault();
edit = false;
});
});