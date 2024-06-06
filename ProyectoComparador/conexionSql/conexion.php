<?php

class Conexion {
    private const HOST = 'localhost'; 
    private const DATABASE = 'pruebacomparador';
    private const USER = 'root';
    private const PASSWORD = 'root';

    public static function conectar() {
        $conexion = new mysqli(self::HOST, self::USER, self::PASSWORD, self::DATABASE);

        if ($conexion->connect_error) {
            die('Error de conexión: ' . $conexion->connect_error);
        }

        return $conexion;
    }
}
?>
