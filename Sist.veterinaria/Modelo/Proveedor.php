<?php

Class Proveedor {
    private $ID_Proveedor;
    private $nombre;
    private $direccion;
    private $telefono;
    private $CorreoElectronico;

    public function __construct($id, $nombre, $direccion, $telefono, $CorreoElectronico){
        $this->ID_Proveedor= $id;
        $this->nombre= $nombre;
        $this->direccion= $direccion;
        $this->telefono= $telefono;
        $this->CorreoElectronico= $CorreoElectronico;
    
    }

    public function getId()
    {
        return $this->ID_Proveedor;
    }
    
    public function getNombre()
    {
        return $this->nombre;
    }
    public function getDireccion()
    {
        return $this->direccion;
    }
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
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
