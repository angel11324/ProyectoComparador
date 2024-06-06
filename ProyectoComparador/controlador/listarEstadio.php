<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

try {
    require_once '../dao/EstadioDAOImpl.php';

    $estadioDao = new EstadioDAOImpl();
    $listaEstadios = $estadioDao->listar();

    echo json_encode($listaEstadios);
} catch (Exception $e) {
    echo json_encode(['error' => $e->getMessage()]);
}
?>