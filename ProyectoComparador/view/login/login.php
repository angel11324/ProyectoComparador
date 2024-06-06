<?php
// Iniciar la sesión
session_start();

// Establecer el tipo de contenido a JSON
header('Content-Type: application/json; charset=utf-8');

// Incluir el archivo de conexión
require_once __DIR__ . '/../../conexionSql/conexion.php';  

// Recoger datos del formulario
$email = $_POST['email'] ?? null;
$contrasena = $_POST['contrasena'] ?? null;

// Inicializar la respuesta
$response = [];

// Verificar que el email y la contraseña han sido enviados
if ($email && $contrasena) {
    // Conectar a la base de datos
    $conexion = Conexion::conectar();

    // Preparar la consulta SQL para verificar las credenciales
    $stmt = $conexion->prepare("SELECT id, nombre, contrasena FROM usuarios WHERE email = ? AND contrasena = ?");
    $stmt->bind_param('ss', $email, $contrasena);
    $stmt->execute();
    $resultado = $stmt->get_result();
    
    // Obtener el usuario si existe
    if ($usuario = $resultado->fetch_assoc()) {
        // Establecer variables de sesión
        $_SESSION['usuario_id'] = $usuario['id'];
        $_SESSION['nombre_usuario'] = $usuario['nombre'];
        
        // Preparar la respuesta de éxito
        $response = ['success' => true, 'message' => 'Autenticación exitosa', 'redirect' => '../dashboardAdmin/dashboard.php'];
    } else {
        // Credenciales incorrectas, preparar la respuesta de error
        $response = ['success' => false, 'message' => 'El email o la contraseña son incorrectos', 'redirect' => 'IndexLogin.php'];
    }
} else {
    // Faltan datos, preparar la respuesta de error
    $response = ['success' => false, 'message' => 'Email y contraseña requeridos', 'redirect' => 'indexLogin.php'];
}

// Enviar la respuesta en formato JSON
echo json_encode($response);
exit;
?>
