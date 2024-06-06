<?php
session_start(); // Iniciar la sesión

require_once __DIR__ . '/../conexionSql/conexion.php'; 
require_once __DIR__ . '/../modelo/Usuario.php';
require_once __DIR__ . '/../dao/UsuarioDAOImpl.php';

// Verificar si se han enviado datos mediante POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recoger los datos del formulario
    $nombre = $_POST['nombre'] ?? '';
    $email = $_POST['email'] ?? '';
    $contrasena = $_POST['contrasena'] ?? '';
    
    // Crear una instancia del DAO
    $usuarioDao = new UsuarioDAOImpl();

    // Crear un objeto Usuario con los datos recibidos
    $usuario = new Usuario(null, $nombre, '', $email, $contrasena);

    // Ejecutamos la consulta
    if ($sql->execute()) {
        $_SESSION['registro_exitoso'] = "¡Registro exitoso! Por favor, inicia sesión.";
        header("Location: ../login/indexLogin.php"); // Redirigir al formulario de inicio de sesión
        exit;
    } else {
        $_SESSION['error_registro'] = "Hubo un error al registrar el usuario. Por favor, inténtalo de nuevo.";
        header("Location: register.php"); // Redirigir al formulario de registro
        exit;
    }
} else {
    header("Location: register.php"); // Redirigir al formulario de registro
    exit;
}
?>
