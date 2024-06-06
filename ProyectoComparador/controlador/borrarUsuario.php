<?php
require_once '../dao/UsuarioDAOImpl.php';
require_once '../conexionSql/conexion.php';
require_once '../modelo/Usuario.php';

header('Content-Type: application/json');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Leer los datos del formulario
    $data = json_decode(file_get_contents('php://input'), true);
    $id = $data['id'];

    // Crear una instancia del DAO
    $usuarioDao = new UsuarioDAOImpl();

    // Eliminar el usuario en la base de datos
    $usuarioDao->eliminar($id);

    echo json_encode(['success' => true, 'message' => 'Usuario eliminado exitosamente']);
}
?>
