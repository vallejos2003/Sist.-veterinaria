<?php

require_once('Modelo/Cliente.php');
require_once('Modelo/gestionCliente.php');
require_once('Modelo/Proveedor.php');
require_once('Modelo/gestionProveedores.php');
require_once('Modelo/Producto.php');
require_once('Modelo/gestionProductos.php');
require_once('Modelo/Stock.php');
require_once('Modelo/gestionStock.php');
require_once('Modelo/Venta.php');
require_once('Modelo/gestionVentas.php');
require_once('Vista/Menuvista.php');
require_once('Controlador/Menu.php');
require_once('Modelo/Conexion1.php');

$db = Conexion1::getConexion();
if ($db != null) {
    echo "Conexion Establecida";
    echo PHP_EOL;
}


$gestionCliente = new gestionCliente();
$gestionProveedores = new gestionProveedores();
$gestionProductos = new gestionProductos();
$gestionStock = new gestionStock();
$gestionVentas = new gestionVentas();
$vista = new Menuvista();

$menu = new Menu($gestionCliente, $gestionProveedores, $gestionProductos, $gestionStock, $gestionVentas, $vista);

$menu->run();