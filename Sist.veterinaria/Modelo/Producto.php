<?php

class Producto {
    private $ID;
    private $nombre;
    private $descripcion; 
    private $precio;

    public function __construct ($id, $nombre, $descripcion, $precio) {
        $this->ID=$id;
        $this->nombre=$nombre;
        $this->descripcion=$descripcion;
        $this->precio=$precio;
    }
    
    public function getID(){
        return $this->ID;
    }

    public function getNombre(){
        return $this->nombre;
    }
    public function setNombre($nombre){
        $this->nombre = $nombre;
        return $this;
    }
    public function getDescripcion(){
        return $this->descripcion;
    }
    public function setDescripcion($descripcion){
        $this->descripcion = $descripcion;
        return $this;
    }
    public function getPrecio(){
        return $this->precio;
    }
    public function setPrecio($precio){
        $this->precio = $precio;
        return $this;
    }
}
