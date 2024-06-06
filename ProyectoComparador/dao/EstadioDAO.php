<?php

interface EstadioDAO{
    public function listar();

    public function obtenerPorId($id);

    public function crear(Estadio $estadio);

    public function actualizar(Estadio $estadio);
    
    public function borrar($id);
}
?>
