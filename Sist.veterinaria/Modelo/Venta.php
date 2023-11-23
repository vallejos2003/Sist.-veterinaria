<?php

class Venta {
    private $ID_Cliente;
    private $fecha; 
    public function __construct ($ID_Cliente, $fecha) {
        $this->ID_Cliente=$ID_Cliente;
        $this->fecha=$fecha;
    }
    public function getFecha(){
        return $this->fecha;
    }
    public function getID_Cliente(){
        return $this->ID_Cliente;
    }

}
