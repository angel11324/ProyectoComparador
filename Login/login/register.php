<?php
session_start();

// Verificar si el usuario ya está autenticado
if(isset($_SESSION['usuario_id'])) {
    // Si ya está autenticado, redirigir a otra página (por ejemplo, el dashboard)
    header("Location: login.html");
    exit;
}

// Verificar si se han enviado datos mediante POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recoger los datos del formulario
    $nombre = $_POST['nombre'] ?? '';
    $email = $_POST['email'] ?? '';
    $contrasena = $_POST['contrasena'] ?? '';

    // Validación básica de los campos
    if (empty($nombre) || empty($email) || empty($contrasena)) {
        $_SESSION['error_registro'] = "Todos los campos son obligatorios.";
        header("Location: register.php"); // Reemplazar con la ruta a tu formulario de registro
        exit;
    }

    // Hash de la contraseña
    $contrasena_hash = password_hash($contrasena, PASSWORD_DEFAULT);

    // Conexión a la base de datos
    require_once __DIR__ . '/../sql/conexion.php';
    $conexion = Conexion::conectar();

    // Preparamos la consulta SQL para insertar el nuevo usuario
    $stmt = $conexion->prepare("INSERT INTO usuarios (nombre, email, contrasena) VALUES (?, ?, ?)");
    $stmt->bind_param('sss', $nombre, $email, $contrasena_hash);

    // Ejecutamos la consulta
    if ($stmt->execute()) {
        // Registro exitoso, redirigimos a la página de inicio de sesión
        $_SESSION['registro_exitoso'] = "¡Registro exitoso! Por favor, inicia sesión.";
        header("Location: login.html"); // Reemplazar con la ruta a tu formulario de inicio de sesión
        exit;
    } else {
        // Error al registrar, mostramos un mensaje de error
        $_SESSION['error_registro'] = "Hubo un error al registrar el usuario. Por favor, inténtalo de nuevo.";
        header("Location: register.php"); // Reemplazar con la ruta a tu formulario de registro
        exit;
    }
} else {
    // Si no se reciben datos por POST, redirigimos a la página de registro solo si el usuario no está autenticado
    header("Location: register.php"); // Reemplazar con la ruta a tu formulario de registro
    exit;
}
?>
