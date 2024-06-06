<?php
require_once '../dao/UsuarioDAOImpl.php';
require_once '../conexionSql/conexion.php';
require_once '../modelo/Usuario.php';

header('Content-Type: application/json');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Leer los datos del formulario
    $nombre = $_POST['nombre'];
    $apellidos = $_POST['apellidos'];
    $email = $_POST['email'];
    $contrasena = $_POST['contrasena'];
    $permisos = $_POST['permisos'];

    // Crear una instancia del DAO
    $usuarioDao = new UsuarioDAOImpl();

    // Crear un objeto Usuario con los datos recibidos
    $usuario = new Usuario(null, $nombre, $apellidos, $email, $contrasena, $permisos);

    // Crear el usuario en la base de datos
    $usuarioDao->crear($usuario);

    echo json_encode(['success' => true, 'message' => 'Usuario creado exitosamente']);
}
?>
