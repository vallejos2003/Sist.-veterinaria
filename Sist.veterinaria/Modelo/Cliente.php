<?php

class Cliente {
    private $id_Cliente;
    private $nombre;
    private $apellido; 
    private $direccion;
    private $telefono;
    private $CorreoElectronico;

    public function __construct ($id_Cliente, $nombre, $apellido, $direccion, $telefono, $CorreoElectronico) {
        $this->id_Cliente= $id_Cliente;
        $this->nombre=$nombre;
        $this->apellido=$apellido;
        $this->direccion=$direccion;
        $this->telefono=$telefono;
        $this->CorreoElectronico=$CorreoElectronico;
    }
    public function getId()
    {
        return $this->id_Cliente;
    }
    public function setid_Cliente($id_Cliente)
    {
        $this->id_Cliente = $id_Cliente;

        return $this;
    }
    public function getNombre()
    {
        return $this->nombre;
    }
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }
    public function getApellido()
    {
        return $this->apellido;
    }

    public function setApellido($apellido)
    {
        $this->apellido = $apellido;

        return $this;
    }


    public function getDireccion()
    {
        return $this->direccion;
    }


    public function setDireccion($direccion)
    {
        $this->direccion = $direccion;

        return $this;
    }
    public function getTelefono()
    {
        return $this->telefono;
    }

    public function setTelefono($telefono)
    {
        $this->telefono = $telefono;

        return $this;
    }

    public function getCorreoElectronico()
    {
        return $this->CorreoElectronico;
    }

    public function setCorreoElectronico($correoelectronico)
    {
        $this->CorreoElectronico = $correoelectronico;

        return $this;
    }


}
