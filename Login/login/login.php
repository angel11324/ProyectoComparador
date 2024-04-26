<?php

session_start();

// Asumiendo que tus detalles de conexión están en 'conexion.php'
require_once __DIR__ . '/../sql/conexion.php';

// Recoger los datos del formulario
$email = $_POST['email'] ?? null;
$contrasena = $_POST['contrasena'] ?? null;

// Verificar que tanto el email como la contraseña han sido enviados
if ($email && $contrasena) {
    // Crear una nueva conexión a la base de datos
    $conexion = Conexion::conectar();

    // Preparar la consulta SQL para verificar las credenciales
    $stmt = $conexion->prepare("SELECT id, nombre, contrasena FROM usuarios WHERE email = ?");
    $stmt->bind_param('s', $email);
    $stmt->execute();
    $resultado = $stmt->get_result();
    
    // Obtener el usuario si existe
    $usuario = $resultado->fetch_assoc();

    // Verificar si el usuario existe y la contraseña es correcta
    if ($usuario && password_verify($contrasena, $usuario['contrasena'])) {
        // Credenciales correctas, establecer variables de sesión
        $_SESSION['usuario_id'] = $usuario['id'];
        $_SESSION['nombre_usuario'] = $usuario['nombre'];

        // Redirigir al área de usuario o dashboard
        header("Location: dashboard.html");
        exit;
    } else {
        // Credenciales incorrectas, redirigir al formulario de login
        $_SESSION['error_login'] = "El email o la contraseña son incorrectos.";
        header("Location: login.html"); // Asegúrate de que login.php pueda mostrar $_SESSION['error_login']
        exit;
    }
} else {
    // Si no se reciben los datos por POST, redirigir al formulario de login
    header("Location: login.html");
    exit;
}

?>
