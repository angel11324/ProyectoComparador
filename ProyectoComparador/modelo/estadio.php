<?php

class Estadio{
    private $idEstadio;
    private $nombre;
    private $pais;
    private $ciudad;
    private $liga;
    private $capacidad;
    private $club;
    private $anoCreacion;

    public function __construct ($id, $nombre, $pais, $ciudad, $liga, $capacidad, $club, $anoCreacion){
        $this->id = $id;
        $this->nombre = $nombre;
        $this->pais = $pais;
        $this->ciudad = $ciudad;
        $this->liga = $liga;
        $this->capacidad = $capacidad;
        $this->club = $club;
        $this->anoCreacion = $anoCreacion;
    }

    public function getIdEstadio()
    {
        return $this->idEstadio;
    }

    public function setIdEstadio($idEstadio): self
    {
        $this->idEstadio = $idEstadio;

        return $this;
    }

    public function getNombre()
    {
        return $this->nombre;
    }

    public function setNombre($nombre): self
    {
        $this->nombre = $nombre;

        return $this;
    }

    public function getPais()
    {
        return $this->pais;
    }

    public function setPais($pais): self
    {
        $this->pais = $pais;

        return $this;
    }

    public function getCiudad()
    {
        return $this->ciudad;
    }

    public function setCiudad($ciudad): self
    {
        $this->ciudad = $ciudad;

        return $this;
    }

    public function getLiga()
    {
        return $this->liga;
    }

    public function setLiga($liga): self
    {
        $this->liga = $liga;

        return $this;
    }

    public function getClub()
    {
        return $this->club;
    }

    public function setClub($club): self
    {
        $this->club = $club;

        return $this;
    }

    public function getCapacidad()
    {
        return $this->capacidad;
    }

    public function setCapacidad($capacidad): self
    {
        $this->capacidad = $capacidad;

        return $this;
    }

    public function getAnoCreacion()
    {
        return $this->anoCreacion;
    }

    public function setAnoCreacion($anoCreacion): self
    {
        $this->anoCreacion = $anoCreacion;

        return $this;
    }
}
?>