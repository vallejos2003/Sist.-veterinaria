<?php
require_once('Conexion1.php');

class gestionVentas{
    public function __construct(){
    }

    public function vender($venta, $detalleVenta) {
        $cantidad = $detalleVenta->getCantidad();
        $precioUnitario = $detalleVenta->getPrecioUnitario();
        $ID_Producto = $detalleVenta->getID_Producto();
        
        $fecha = $venta->getFecha();
        $ID_Cliente = $venta->getID_Cliente();

        $sql = "INSERT INTO Compra (FechaCompra, ID_Cliente)
                VALUES ('2023-11-16', '$ID_Cliente')"; // esta hardcodeada la fecha, poner la del dia actual

        Conexion1::ejecutar($sql);
        

        $conexion = Conexion1::getConexion();
        $query = $conexion->prepare("SELECT ID_Compra FROM Compra ORDER BY ID_Compra DESC");
        $query->execute();
        $id = $query->fetch(PDO::FETCH_ASSOC);
        if ($id) {
            $ID_Compra = $id['id_compra'] ;
        }

        $sql = "INSERT INTO DetalleCompra (Cantidad, PrecioUnitario, ID_Producto, ID_Compra)
                VALUES ('$cantidad', '$precioUnitario', '$ID_Producto','$ID_Compra')";

        Conexion1::ejecutar($sql);

        echo "La venta se realizo exitosamente\n";
    }
}