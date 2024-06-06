document.addEventListener('DOMContentLoaded', function(){
    let registerButton = document.querySelector('.register-button');

    registerButton.addEventListener('click', function(event) {
        event.preventDefault();
        registro('register.php'); // Llamar a la función registro
    });
});

function registro(url){
    let f_nombre = document.getElementById('nombre').value;
    let f_email = document.getElementById('email').value;
    let f_contrasena = document.getElementById('contrasena').value;
    
    let data_send = new FormData();
    data_send.append('nombre', f_nombre);
    data_send.append('email', f_email);
    data_send.append('contrasena', f_contrasena);

    fetch(url, {method: 'POST', body: data_send})
    .then(response => response.json()) // Convierte la respuesta en JSON
    .then(datos => {
        if (datos.success) {
            swal({
                title: "¡Éxito!",
                text: "Usuario creado correctamente.",
                icon: "success",
                button: "Aceptar"
            }).then(() => {
                window.location.href = datos.redirect; // Redirección tras confirmar
            });
        } else {
            swal({
                title: "Error",
                text: datos.message,
                icon: "error",
                button: "Reintentar"
            });
        }
    })
    .catch(err => {
        swal({
            title: "Error",
            text: "Ha ocurrido un error en la conexión con el servidor. Por favor, inténtalo de nuevo.",
            icon: "error",
            button: "Aceptar"
        });
        console.error(err);
    });
}
