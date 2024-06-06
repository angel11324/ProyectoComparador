<?php
require_once '../dao/UsuarioDAOImpl.php';
require_once '../modelo/Usuario.php';

// Verificar si se recibieron los datos del formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Leer los datos del formulario
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $apellidos = $_POST['apellidos'];
    $email = $_POST['email'];
    $contrasena = $_POST['contrasena'];
    $permisos = $_POST['permisos'];


    // Crear una instancia del DAO
    $usuarioDao = new UsuarioDAOImpl();

    // Crear un objeto Usuario con los datos recibidos
    $usuario = new Usuario($id, $nombre, $apellidos, $email, $contrasena, $permisos);

    // Actualizar el usuario en la base de datos
   $mensaje = $usuarioDao->actualizar($usuario);

echo json_encode($mensaje); 

}
?>
