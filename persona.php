<?php

class Persona
{
    private $id;
    private $nombre;
    private $apellidos;
    private $sexo;

    function __construct($nombre = null, $apellidos = null, $sexo = null)
    {
        $this->nombre = $nombre;
        $this->apellidos = $apellidos;
        $this->sexo = $sexo;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    public function setApellidos($apellidos)
    {
        $this->apellidos = $apellidos;
    }

    public function setSexo($sexo)
    {
        $this->sexo = $sexo;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getNombre()
    {
        return $this->nombre;
    }

    public function getApellidos()
    {
        return $this->apellidos;
    }
    public function getSexo()
    {
        return $this->sexo;
    }

}

?>