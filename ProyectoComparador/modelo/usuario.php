<?php
class Usuario {
    private $id;
    private $nombre;
    private $apellidos;
    private $email;
    private $contrasena;
    private $permisos;

    public function __construct($id, $nombre, $apellidos, $email, $contrasena, $permisos) {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->apellidos = $apellidos;
        $this->email = $email;
        $this->contrasena = $contrasena;
        $this ->permisos = $permisos;
    }

    // Getters
    public function getId() {
        return $this->id;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function getApellidos() {
        return $this->apellidos;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getContrasena() {
        return $this->contrasena;
    }

public function getPermisos(){
    return $this->permisos;
}

    // Setters
    public function setId($id) {
        $this->id = $id;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function setApellidos($apellidos) {
        $this->apellidos = $apellidos;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function setContrasena($contrasena) {
        $this->contrasena = $contrasena;
    }

    public function setPermisos($permisos){
        $this ->permisos = $permisos;
    }
}
