
<?php
// Dado que UsuarioDAOImpl.php y UsuarioDAO.php están en el mismo directorio
require_once 'UsuarioDAO.php';

// Dado que UsuarioDAOImpl.php está en la carpeta `dao` y Usuario.php en la carpeta `modelo`
require_once __DIR__ . '/../modelo/Usuario.php';

// Dado que UsuarioDAOImpl.php está en la carpeta `dao` y conexion.php en la carpeta `sql`
require_once __DIR__ . '/../sql/conexion.php';

class UsuarioDAOImpl implements UsuarioDAO {
    private $conexion;

    public function __construct() {
        $this->conexion = Conexion::conectar();
    }

    public function listarTodos() {
        $sql = "SELECT * FROM usuarios";
        $resultado = $this->conexion->query($sql);
        $usuarios = [];
        while ($fila = $resultado->fetch_object('Usuario')) {
            $usuarios[] = $fila;
        }
        return $usuarios;
    }

    public function obtenerPorId($id) {
        $sql = "SELECT * FROM usuarios WHERE id = ?";
        $stmt = $this->conexion->prepare($sql);
        $stmt->bind_param('i', $id);
        $stmt->execute();
        $resultado = $stmt->get_result();
        return $resultado->fetch_object('Usuario');
    }

    public function crear(Usuario $usuario) {
        $sql = "INSERT INTO usuarios (nombre, apellidos, email, contrasena) VALUES (?, ?, ?, ?)";
        $stmt = $this->conexion->prepare($sql);
        $stmt->bind_param('ssss', 
            $usuario->getNombre(),
            $usuario->getApellidos(),
            $usuario->getEmail(),
            $usuario->getContrasena()
        );
        $stmt->execute();
    }

    public function actualizar(Usuario $usuario) {
        $sql = "UPDATE usuarios SET nombre = ?, apellidos = ?, email = ?, contrasena = ? WHERE id = ?";
        $stmt = $this->conexion->prepare($sql);
        $stmt->bind_param('ssssi', 
            $usuario->getNombre(),
            $usuario->getApellidos(),
            $usuario->getEmail(),
            $usuario->getContrasena(),
            $usuario->getId()
        );
        $stmt->execute();
    }

    public function eliminar($id) {
        $sql = "DELETE FROM usuarios WHERE id = ?";
        $stmt = $this->conexion->prepare($sql);
        $stmt->bind_param('i', $id);
        $stmt->execute();
    }

    // En UsuarioDAOImpl.php


}
