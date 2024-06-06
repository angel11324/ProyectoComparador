window.addEventListener("DOMContentLoaded", function() {
    let cajaUsuarios = document.getElementById("cajaUsuarios");
    window.res = []; // Variable global para almacenar los datos de los usuarios

    // Solicitud para obtener los datos de los usuarios desde "usuariosControlador.php"
    fetch("usuariosControlador.php")
        .then((respuesta) => respuesta.json())
        .then((data) => {
            res = data; // Guardar los datos de los usuarios en la variable global
            console.log(res); // Imprimir los datos en la consola para verificar
            imprimirUsuarios(res); // Llamar a la función para mostrar los usuarios en la página
        });

    // Función para generar el HTML de la tabla de usuarios y mostrarla en la página
    window.imprimirUsuarios = function(usuarios) {
        let html = "<table>"; // Inicio de la tabla
        html += "<tr><th>Nombre</th><th>Apellidos</th><th>Email</th><th>Acciones</th></tr>"; // Encabezado de la tabla

        // Recorrer la lista de usuarios y generar una fila para cada uno
        for (let i = 0; i < usuarios.length; i++) {
            let usuario = usuarios[i];
            html += `
                <tr>
                    <td>${usuario.nombre}</td>
                    <td>${usuario.apellidos}</td>
                    <td>${usuario.email}</td>
                    <td>
                        <button class="btn" onclick="editarUsuario(${usuario.id})">Editar</button>
                        <button class="btn delete" onclick="borrarUsuario(${usuario.id})">Borrar</button>
                    </td>
                </tr>
            `;
        }

        html += "</table>"; // Fin de la tabla
        cajaUsuarios.innerHTML = html; // Insertar la tabla generada en el contenedor
    }

    // Función para rellenar el formulario de edición con los datos del usuario seleccionado
    window.editarUsuario = function(id) {

        // Buscar el usuario en la lista de usuarios
        let usuario = res.find(u => u.id == id);

        // Si se encuentra el usuario, rellenar el formulario y mostrarlo
        if (usuario) {
            document.getElementById('usuarioId').value = usuario.id;
            document.getElementById('nombre').value = usuario.nombre;
            document.getElementById('apellidos').value = usuario.apellidos;
            document.getElementById('email').value = usuario.email;
            document.getElementById('contrasena').value = usuario.contrasena;
            document.getElementById('permisos').value = usuario.permisos;
            document.getElementById('formularioEdicion').style.display = 'block';
            document.getElementById('formularioCreacion').style.display = 'none'; // Ocultar el formulario de creación
        }
    }

    // Función para guardar los cambios del usuario editado
    window.guardarUsuario = function() {
        // Obtener los valores del formulario
        let id = document.getElementById('usuarioId').value;
        let nombre = document.getElementById('nombre').value;
        let apellidos = document.getElementById('apellidos').value;
        let email = document.getElementById('email').value;
        let contrasena = document.getElementById('contrasena').value;
        let permisos = document.getElementById('permisos');
        if(permisos.checked){
            permisos.value = 1;
        } else if(!permisos.checked){
            permisos.value = 0;
        }

        // Crear un objeto FormData
        let formData = new FormData();
        formData.append('id', id);
        formData.append('nombre', nombre);
        formData.append('apellidos', apellidos);
        formData.append('email', email);
        formData.append('contrasena', contrasena);
        formData.append('permisos', permisos.value);

        console.log(permisos.value);

        
        // Enviar los datos actualizados al servidor
        fetch('../../../Controlador/actualizarUsuario.php', {
            method: 'POST',
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            alert('Usuario actualizado correctamente.');
            location.reload(); // Recarga la página para mostrar los cambios
        });
    }

    // Función para mostrar el formulario de creación de usuario
    window.mostrarFormularioCreacion = function() {
        document.getElementById('formularioEdicion').style.display = 'none'; // Ocultar el formulario de edición
        document.getElementById('formularioCreacion').style.display = 'block'; // Mostrar el formulario de creación
    }

    // Función para crear un nuevo usuario
    window.crearUsuario = function() {
        // Obtener los valores del formulario
        let nombre = document.getElementById('nombreNuevo').value;
        let apellidos = document.getElementById('apellidosNuevo').value;
        let email = document.getElementById('emailNuevo').value;
        let contrasenaNueva = document.getElementById('contrasenaNuevo').value;
        let permisosNuevo = document.getElementById('permisosNuevo');

        if(permisosNuevo.checked){
            permisosNuevo.value = 1;
        } else if(!permisosNuevo.checked){
            permisosNuevo.value = 0;
        }

        // Crear un objeto FormData
        let formDataCrear = new FormData();
        formDataCrear.append('nombre', nombre);
        formDataCrear.append('apellidos', apellidos);
        formDataCrear.append('email', email);
        formDataCrear.append('contrasena', contrasenaNueva);
        formDataCrear.append('permisos', permisosNuevo.value);

        console.log(permisosNuevo.value);

        fetch('../../../Controlador/crearUsuario.php', {
            method: 'POST',
            body: formDataCrear
        })
        .then(response => response.json())
        .then(data => {
            alert('Usuario creado correctamente.');
            location.reload(); // Recarga la página para mostrar los cambios
        });
    }

    // Función para borrar un usuario
    window.borrarUsuario = function(id) {
        if (confirm('¿Estás seguro de que deseas eliminar este usuario?')) {
            fetch('../../../Controlador/borrarUsuario.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({ id: id })
            })
            .then(response => response.json())
            .then(data => {
                alert('Usuario eliminado correctamente.');
                location.reload(); // Recarga la página para mostrar los cambios
            });
        }
    }
});
