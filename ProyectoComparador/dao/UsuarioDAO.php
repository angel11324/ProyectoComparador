<?php

interface UsuarioDAO {
    public function listarTodos();
    public function obtenerPorId($id);
    public function crear(Usuario $usuario);
    public function actualizar(Usuario $usuario);
    public function eliminar($id);
}
