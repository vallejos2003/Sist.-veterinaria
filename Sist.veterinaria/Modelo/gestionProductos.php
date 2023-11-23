<?php
require_once('Conexion1.php');

class gestionProductos{
    private $productos=[];

    public function __construct(){
       $this->cargarProductos();
    }


    public function agregarProducto($producto) {
        $nombre = $producto->getNombre();
        $descripcion =$producto->getDescripcion();
        $precio = $producto->getPrecio();
        $id = $producto->getID();
        $productoNuevo = new Producto($id, $nombre, $descripcion, $precio);
        $this->productos[] = $productoNuevo;
        $sql = "INSERT INTO Producto (nombre, descripcion, precio)
                VALUES ('$nombre', '$descripcion', '$precio')";
        Conexion1::ejecutar($sql);
        echo "El producto se agrego exitosamente\n";
    }

    public function listarProductos() {
        if (empty($this->productos)) {
            echo "No hay productos disponibles.\n";
        } else {
            echo "\nLista de productos:\n";
            foreach ($this->productos as $producto) {
                echo "ID: " . $producto->getID() . ", Nombre: " . $producto->getNombre() . ", Descripcion: " . $producto->getDescripcion(). ", Precio: " . $producto->getPrecio() . "\n";
            } 
            echo PHP_EOL;
        }
    }

    public function cargarProductos(){
        $sql = "SELECT * FROM Producto";
        $productos = Conexion1::query($sql);
        foreach ($productos as $producto) {
            if (is_object($producto)) {
                    //print_r($producto);
                    $nuevoProducto = new Producto(
                    $producto->id_producto,    
                    $producto->nombre,
                    $producto->descripcion,
                    $producto->precio
                );
                $this->productos[] = $nuevoProducto;
            } else {
                echo "Los datos de los productos no están en el formato esperado.";
            }
        }
    }

    public function obtenerPrecio($ID){
        if ($ID != ""){
            $conexion = Conexion1::getConexion();
            $query = $conexion->prepare("SELECT Precio FROM Producto WHERE ID_Producto = :ID");
            $query->bindParam(':ID', $ID);
            $query->execute();
    
            $precio = $query->fetch(PDO::FETCH_ASSOC);
    
            if ($precio) {
                return $precio;
            }   else {
                return null;
            } 
        } 
    }

    public function modificarProductoPorNombre($nombre, $nuevoNombre, $nuevaDescripcion, $nuevoPrecio) {
        $conexion = Conexion1::getConexion();
        $query = $conexion->prepare("UPDATE Producto SET nombre = :nuevoNombre, descripcion = :nuevaDescripcion, precio = :nuevoPrecio WHERE nombre = :nombre");
        $query->bindParam(':nuevoNombre', $nuevoNombre);
        $query->bindParam(':nuevaDescripcion', $nuevaDescripcion);
        $query->bindParam(':nuevoPrecio', $nuevoPrecio);
        $query->bindParam(':nombre', $nombre);
        $resultado = $query->execute();
        if ($resultado && $query->rowCount() > 0) {
            $this->cargarProductos();
            return true;
        }
        return false;
    }

    public function buscarProductoPorNombre($nombre) {
        if ($nombre != ""){
            $conexion = Conexion1::getConexion();
            $query = $conexion->prepare("SELECT * FROM Producto WHERE nombre = :nombre");
            $query->bindParam(':nombre', $nombre);
            $query->execute();
    
            $producto = $query->fetch(PDO::FETCH_ASSOC);
    
            if ($producto) {
                return new Producto(
                    $producto['id_producto'],
                    $producto['nombre'],
                    $producto['descripcion'],
                    $producto['precio']                 );
            }   else {
                return null;
            } 
        } 
    }
}