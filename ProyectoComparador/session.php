<?php
session_start();

// Verificar si el usuario ha iniciado sesión
function checkSession() {
    if (!isset($_SESSION['usuario_id'])) {
        // Si no ha iniciado sesión, redirigir al formulario de inicio de sesión
        header('Location: ../../view/login/indexLogin.php');
        exit;
    }
}

// Obtener el nombre del usuario
function getNombreUsuario() {
    return $_SESSION['nombre_usuario'] ?? null;
}
?>
