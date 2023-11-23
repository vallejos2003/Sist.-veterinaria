<?php
require_once('Conexion1.php');

class gestionStock{
    private $stock=[];

    public function __construct(){
        $this->cargarStock();
    }

    public function insertarStock($stock) {
        $ID_Producto = $stock->getID_Producto();
        $cantidad = $stock->getCantidad();
        $sql = "INSERT INTO Stock (cantidad, ID_Producto)
                VALUES ('$cantidad', '$ID_Producto')";

        Conexion1::ejecutar($sql);
        echo "El stock se actualizo exitosamente\n";
    }

    public function listarStock() {
        if (empty($this->stock)) {
            echo "No hay stock disponible.\n";
        } else {
            echo "\nStock:\n";
            foreach ($this->stock as $unStock) {
                echo "ID: " . $unStock->getID_Producto() . ", Nombre: " . $this->obtenerNombreProducto($unStock->getID_Producto()) . ", Cantidad: " . $unStock->getCantidad() . "\n";
            } 
            echo PHP_EOL;
        }
    }

    public function obtenerNombreProducto($id){
        if ($id != ""){
            $conexion = Conexion1::getConexion();
            $query = $conexion->prepare("SELECT nombre FROM Producto WHERE ID_Producto = :ID");
            $query->bindParam(':ID', $id);
            $query->execute();
    
            $nombre = $query->fetch(PDO::FETCH_ASSOC);
    
            if ($nombre) {
                return $nombre ['nombre'];
            }   else {
                return null;
            } 
        } 
    }

    public function cargarStock(){
        $sql = "SELECT * FROM Stock";
        $stocks = Conexion1::query($sql);
        print_r($stocks);
        foreach ($stocks as $stock) {
            if (is_object($stock)) {
                    $nuevoStock = new Stock(  
                    $stock->id_producto,
                    $stock->cantidad
                );
                $this->stock[] = $nuevoStock;
            } else {
                echo "Los datos del stock no están en el formato esperado.";
            }
        }
    }
}