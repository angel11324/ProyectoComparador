<?php
 class Conexion {
    private const HOST = 'localhost'; 
    private const DATABASE = 'pruebacomparador';
    private const USER = 'root';
    private const PASSWORD = '';

    public static function conectar() {
        $conexion = new mysqli(self::HOST, self::USER, self::PASSWORD, self::DATABASE);

        if ($conexion->connect_error) {
            die('Error de conexiÃ³n: ' . $conexion->connect_error);
        }

        return $conexion;
    }
}
?>