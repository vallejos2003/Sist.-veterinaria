<?php

class Stock {
    private $cantidad;
    private $id_Producto; 

    public function __construct ($id, $cantidad) {
        $this->cantidad=$cantidad;
        $this->id_Producto=$id;
    }
    public function getCantidad(){
        return $this->cantidad;
    }
    public function setCantidad($cantidad){
        $this->cantidad = $cantidad;
        return $this;
    }
    public function getID_Producto(){
        return $this->id_Producto;
    }
}
