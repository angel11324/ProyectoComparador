<?php
session_start(); // Iniciar la sesión


// Verificar si se han enviado datos mediante POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recoger los datos del formulario
    $nombre = $_POST['nombre'] ?? '';
    $email = $_POST['email'] ?? '';
    $contrasena = $_POST['contrasena'] ?? '';

    // Validación de los campos
    if (empty($nombre) || empty($email) || empty($contrasena)) {
        $_SESSION['error_registro'] = "Todos los campos son obligatorios.";
        header("Location: register.php"); // Redirigir al formulario de registro
        exit;
    }

    // Conexión a la base de datos
    require_once __DIR__ . '/../../conexionSql/conexion.php'; 
    $conexion = Conexion::conectar();

    // Preparamos la consulta SQL para insertar el nuevo usuario
    $sql = $conexion->prepare("INSERT INTO usuarios (nombre, email, contrasena) VALUES (?, ?, ?)");
    $sql->bind_param('sss', $nombre, $email, $contrasena); 

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
