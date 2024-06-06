document.addEventListener('DOMContentLoaded', function() {
    let loginButton = document.querySelector('.login-button');

    loginButton.addEventListener('click', function(event) {
        event.preventDefault();
        peticion('login.php');
    });
});

function peticion(url) {
    let f_email = document.getElementById('email').value;
    let f_contrasena = document.getElementById('contrasena').value;
    

    let data_send = new FormData();
    data_send.append('email', f_email); // Añadir el email a FormData
    data_send.append('contrasena', f_contrasena); // Añadir la contraseña a FormData

    fetch(url, {method: 'POST', body: data_send})
        .then(response => response.json()) // Convertir la respuesta a JSON
        .then(datos => {
            if (datos.success) {
                swal({
                    title: "¡Éxito!",
                    text: "Has iniciado sesión correctamente.",
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
