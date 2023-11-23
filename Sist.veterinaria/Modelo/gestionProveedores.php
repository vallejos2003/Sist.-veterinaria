<?php
require_once('Conexion1.php');
require_once('Proveedor.php');

class gestionProveedores{
    private $proveedores=[];

    public function __construct(){
       $this->cargarProveedores();
    }
    
    public function agregarProveedor($proveedor) {
        $this->proveedores[] = $proveedor;
        $nombre = $proveedor->getNombre();
        $direccion = $proveedor->getDireccion();
        $telefono = $proveedor->getTelefono();
        $correoelectronico = $proveedor->getCorreoElectronico();

        $sql = "INSERT INTO proveedor (nombre, direccion, telefono, correoelectronico)
                VALUES ('$nombre','$direccion','$telefono','$correoelectronico')";

        Conexion1::ejecutar($sql);        
        echo "El Proveedor se agrego exitosamente\n";
    }
    
    public function eliminarProveedorPorNombre($nombre) {
        $conexion = Conexion1::getConexion();
        try {
            $query = $conexion->prepare("DELETE FROM Proveedor WHERE nombre = :nombre");
            $query->bindParam(':nombre', $nombre);
            $resultado = $query->execute();
            if ($resultado && $query->rowCount() > 0) {
                $this->cargarProveedores();
                return true;
            }
            return false;
        }catch (PDOException $e) {
            echo 'Error al eliminar Proveedor.';
       }
    }

    public function listarProveedores() {
        if (empty($this->proveedores)) {
            echo "No hay proveedores disponibles.\n";
        } else {
            echo "\nLista de proveedores:\n";
            foreach ($this->proveedores as $proveedor) {
                echo "ID: " . $proveedor->getID() . ", Nombre: " . $proveedor->getNombre() . "\n";
            } 
            echo PHP_EOL;
        }
    }

    public function cargarProveedores(){
        $sql = "SELECT * FROM Proveedor";
        $Proveedores = Conexion1::query($sql);
        foreach ($Proveedores as $proveedor) {
            if (is_object($proveedor)) {
                    $nuevoProveedor = new Proveedor(  
                    $proveedor->id_proveedor,
                    $proveedor->nombre,
                    $proveedor->direccion,
                    $proveedor->telefono,
                    $proveedor->correoelectronico
                );
                $this->proveedores[] = $nuevoProveedor;
            } else {
                echo "Los datos del proveedor no están en el formato esperado.";
            }
                }
    }

    public function buscarProveedorPorNombre($nombre) {
        if ($nombre != ""){
            $conexion = Conexion1::getConexion();
            $query = $conexion->prepare("SELECT * FROM Proveedor WHERE nombre = :nombre");
            $query->bindParam(':nombre', $nombre);
            $query->execute();
    
            $proveedor = $query->fetch(PDO::FETCH_ASSOC);
    
            if ($proveedor) {
                return new Proveedor(
                    $proveedor['id_proveedor'],
                    $proveedor['nombre'],
                    $proveedor['direccion'],
                    $proveedor['telefono'],
                    $proveedor['correoelectronico']
                 );
            }   else {
                return null;
            } 
        } 
    }
    

    public function modificarProveedorPorNombre($nombre, $nuevoNombre, $nuevaDireccion, $nuevoTelefono, $nuevoCorreoElectronico) {
        $conexion = Conexion1::getConexion();
        $query = $conexion->prepare("UPDATE Proveedor SET nombre = :nuevoNombre, direccion = :nuevaDireccion, telefono = :nuevoTelefono, correoElectronico = :nuevoCorreoElectronico WHERE nombre = :nombre");
        $query->bindParam(':nuevoNombre', $nuevoNombre);
        $query->bindParam(':nuevaDireccion', $nuevaDireccion);
        $query->bindParam(':nuevoTelefono', $nuevoTelefono);
        $query->bindParam(':nuevoCorreoElectronico', $nuevoCorreoElectronico);
        $query->bindParam(':nombre', $nombre);
        $resultado = $query->execute();
    
        if ($resultado && $query->rowCount() > 0) {
            $this->cargarProveedores();
            return true;
        }
    
        return false;
    }
}