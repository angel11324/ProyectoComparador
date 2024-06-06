<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

try {
    require_once __DIR__ . '/../../../dao/UsuarioDAOImpl.php';

    $usuarioDao = new UsuarioDAOImpl();
    $listaUsuarios = $usuarioDao->listarTodos();

    echo json_encode($listaUsuarios);
} catch (Exception $e) {
    echo json_encode(['error' => $e->getMessage()]);
}
?>
