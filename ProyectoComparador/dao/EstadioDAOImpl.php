<?php
require_once 'UsuarioDAO.php';
require_once __DIR__ . '/../modelo/estadio.php';
require_once __DIR__ . '/../conexion/conexion.php';

class UsuarioDAOImpl implements EstadioDAO {
    private $conexion;

    public function __construct() {
        $this->conexion = Conexion::conectar();
    }

    public function listar() {
        $consulta = mysqli_query($this->conexion, "SELECT * FROM estadios") or die("Error en consulta: " . mysqli_error($this->conexion));
        
        $datosArray = array();
        while ($reg = mysqli_fetch_array($consulta)) {
            $datosArray[] = $reg;
        }
        
        return $datosArray;
    }

    public function obtenerPorId($id) {
        $sql = "SELECT * FROM estadios WHERE id = ?";
        $stmt = $this->conexion->prepare($sql);
        $stmt->bind_param('i', $id);
        $stmt->execute();
        $resultado = $stmt->get_result();
        return $resultado->fetch_assoc();
    }

    public function crear(Estadio $estadio) {
        $sql = "INSERT INTO estadio (nombre, pais, ciudad, liga, capacidad, club, anoCreacion) VALUES (?, ?, ?, ?, ?, ?, ?)";
        $stmt = $this->conexion->prepare($sql);
        $stmt->bind_param('ssssisi', 
            $estadio->getNombre(),
            $estadio->getPais(),
            $estadio->getCiudad(),
            $estadio->getLiga(),
            $estadio->getCapacidad(),
            $estadio->getClub(),
            $estadio->getAnoCreacion()
        );
        $stmt->execute();
    }

    public function actualizar(Estadio $estadio) {
        $sql = "UPDATE estadio SET nombre = ?, pais = ?, ciudad = ?, liga = ?, capacidad = ?, club = ?, anoCreacion = ? WHERE id = ?";
        $stmt = $this->conexion->prepare($sql);
        
        // Variables intermedias para evitar el error "Only variables should be passed by reference"
        $nombre = $estadio->getNombre();
        $pais = $estadio->getPais();
        $ciudad = $estadio->getCiudad();
        $liga = $estadio->getLiga();
        $capacidad = $estadio->getCapacidad();
        $club = $estadio->getClub();
        $anoCreacion = $estadio->getAnoCreacion();
        $id = $estadio->getId();
        
        $stmt->bind_param('ssssisii', $nombre, $pais, $ciudad, $liga, $capacidad, $club, $anoCreacion, $id);
        
        if ($stmt->execute()) {
            return "Actualizado";
        } else {
            return "Error al actualizar: " . $stmt->error
        }
    }

    public function eliminar($id) {
        $sql = "DELETE FROM estadio WHERE id = ?";A
        $stmt = $this->conexion->prepare($sql);
        $stmt->bind_param('i', $id);
        $stmt->execute();
    }
}
?>