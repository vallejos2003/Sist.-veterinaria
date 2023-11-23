<?php

class detalleVenta {
    private $cantidad;
    private $precioUnitario;
    private $ID_Compra;
    private $ID_Producto; 
    public function __construct ($cantidad,$precioUnitario, $ID_Producto) {
        $this->cantidad=$cantidad;
        $this->precioUnitario=$precioUnitario;
        //$this->ID_Compra = $ID_Compra;
        $this->ID_Producto = $ID_Producto;
    }
    public function getCantidad(){
        return $this->cantidad;
    }
    public function getPrecioUnitario(){
        return $this->precioUnitario;
    }
    //public function getID_Compra(){
      //  return $this->ID_Compra;
    //}
    public function getID_Producto(){
        return $this->ID_Producto;
    }
}
