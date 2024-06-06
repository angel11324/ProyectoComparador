<?php
require_once 'UsuarioDAO.php';
require_once __DIR__ . '/../modelo/Usuario.php';
require_once __DIR__ . '/../conexionSql/conexion.php';

class UsuarioDAOImpl implements UsuarioDAO {
    private $conexion;

    public function __construct() {
        $this->conexion = Conexion::conectar();
    }

    public function listarTodos() {
        $consulta = mysqli_query($this->conexion, "SELECT * FROM usuarios") or die("Error en consulta: " . mysqli_error($this->conexion));
        
        $datosArray = array();
        while ($reg = mysqli_fetch_array($consulta)) {
            $datosArray[] = $reg;
        }
        
        return $datosArray;
    }

    public function obtenerPorId($id) {
        $sql = "SELECT * FROM usuarios WHERE id = ?";
        $stmt = $this->conexion->prepare($sql);
        $stmt->bind_param('i', $id);
        $stmt->execute();
        $resultado = $stmt->get_result();
        return $resultado->fetch_assoc();
    }

    public function crear(Usuario $usuario) {
        $sql = "INSERT INTO usuarios (nombre, apellidos, email, contrasena, permisos) VALUES (?, ?, ?, ?,?)";
        $stmt = $this->conexion->prepare($sql);
        $stmt->bind_param('ssss', 
            $usuario->getNombre(),
            $usuario->getApellidos(),
            $usuario->getEmail(),
            $usuario->getContrasena(),
            $usuario->getPermisos()
        );
        $stmt->execute();
    }

    public function actualizar(Usuario $usuario) {
        $sql = "UPDATE usuarios SET nombre = ?, apellidos = ?, email = ?, contrasena = ?, permisos = ? WHERE id = ?";
        $stmt = $this->conexion->prepare($sql);
        
        // Variables intermedias para evitar el error "Only variables should be passed by reference"
        $nombre = $usuario->getNombre();
        $apellidos = $usuario->getApellidos();
        $email = $usuario->getEmail();
        $contrasena = $usuario->getContrasena();
        $permisos = $usuario->getPermisos();
        $id = $usuario->getId();
        
        $stmt->bind_param('ssssii', $nombre, $apellidos, $email, $contrasena, $permisos, $id);
        
        if ($stmt->execute()) {
            return "Actualizado";
        } else {
            return "Error al actualizar: " . $stmt->error;
        }
    }

    public function eliminar($id) {
        $sql = "DELETE FROM usuarios WHERE id = ?";
        $stmt = $this->conexion->prepare($sql);
        $stmt->bind_param('i', $id);
        $stmt->execute();
    }
}
?>
