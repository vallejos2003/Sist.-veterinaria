<?php
require_once('C:/Sist.veterinaria/Modelo/Cliente.php');
require_once('C:/Sist.veterinaria/Modelo/gestionCliente.php');
require_once('C:/Sist.veterinaria/Modelo/Proveedor.php');
require_once('C:/Sist.veterinaria/Modelo/gestionProveedores.php');
require_once('C:/Sist.veterinaria/Modelo/Producto.php');
require_once('C:/Sist.veterinaria/Modelo/gestionProductos.php');
require_once('C:/Sist.veterinaria/Modelo/Stock.php');
require_once('C:/Sist.veterinaria/Modelo/gestionStock.php');
require_once('C:/Sist.veterinaria/Modelo/Venta.php');
require_once('C:/Sist.veterinaria/Modelo/gestionVentas.php');
require_once('C:/Sist.veterinaria/Modelo/detalleVenta.php');
require_once('C:/Sist.veterinaria/Vista/Menuvista.php');

class Menu {
    private $gestionCliente;
    private $gestionProveedores;
    private $gestionProductos;
    private $gestionStock;
    private $gestionVentas;
    private $vista;

    public function __construct($gestionCliente, $gestionProveedores, $gestionProductos, $gestionStock, $gestionVentas, $vista){
        $this->gestionCliente = $gestionCliente;
        $this->gestionProveedores = $gestionProveedores;
        $this->gestionProductos = $gestionProductos;
        $this->gestionStock = $gestionStock;
        $this->gestionVentas = $gestionVentas;
        $this->vista = $vista;
    }
    public function run() {
        $opcionMenu = 1;
        $this->menu($opcionMenu);
    }

    public function menu($opcionMenu) {
        while (true){
            $this->vista->mostrarMenuPrincipal();
            $opcionMenu = readline("Selecciona una opción: ");
        switch ($opcionMenu) {
            case '1':
                $this->vista->mostrarSubMenuClientes();
                $this->subMenuClientes();
                break;
            case '2':
                $this->vista->mostrarSubMenuProveedores();
                $this->subMenuProveedores();
                break;
            case '3':
                $this->vista->mostrarSubMenuProductos();
                $this->subMenuProductos();
                break;
            case '4':
                $this->vista->mostrarSubMenuStock();
                $this->subMenuStock();
                break;
            case '5':
                $this->vista->mostrarSubMenuVentas();
                $this->subMenuVentas();
                break;
            case '0':
                echo "Gracias por usar el sistema";
                exit;
            }
        }
    }
    function subMenuClientes() {
         $opcionUsuario = readline("Selecciona una opción: ");
        switch ($opcionUsuario){
         case '1':
            echo "Seleccionaste Dar de Alta Cliente\n";
            $nombre = readline("Ingrese nombre: ");
            $apellido = readline("Ingrese apellido: ");
            $direccion = readline("Ingresar direccion: ");
            $telefono = readline("Ingrese telefono: ");
            $CorreoElectronico = readline("Ingrese el correo electronico: ");
            $cliente = new Cliente($nombre, $apellido, $direccion, $telefono, $CorreoElectronico);
            $this->gestionCliente->agregarCliente($cliente);
            break;
        case '2':
            echo "Seleccionaste Dar de Baja Cliente\n";
            $this->gestionCliente->listarClientes();
            echo "Ingrese el apellido del cliente a eliminar: ";
            $apellido = readline();
            $clienteEliminado = $this->gestionCliente->eliminarClientePorApellido($apellido);
            if ($clienteEliminado) {
                echo "Cliente con apellido $apellido ha sido eliminado correctamente.\n";
            } else {
                echo "\n No se pudo eliminar Cliente con el apellido $apellido. \n";
            }
            break;
        case '3':
            echo "Seleccionaste Modificar Datos de Cliente\n";
            $apellidoModificar = readline("Ingrese el apellido del cliente a modificar: ");
            $clienteEncontrado = $this->gestionCliente->buscarClientePorApellido($apellidoModificar);
            if ($clienteEncontrado) {
                $nombreNuevo = readline("Ingrese el nuevo nombre del cliente: ");
                $apellidoNuevo = readline("Ingrese el nuevo apellido del cliente: ");
                $direccionNueva = readline("Ingrese la nueva direccion del cliente: ");
                $telefonoNuevo = readline("Ingrese el nuevo telefono del cliente: ");
                $emailNuevo = readline("Ingrese el nuevo correo del cliente: ");

                $this->gestionCliente->modificarClientePorApellido($apellidoModificar, $nombreNuevo, $apellidoNuevo, $direccionNueva, $telefonoNuevo, $emailNuevo);
                echo "Los datos del cliente han sido modificados.\n";
            } else {
                echo "No se encontró ningún cliente con ese apellido.\n";
            }
            break;
        case '4':
            $this->gestionCliente->listarClientes();
            break;
        case '0':
            echo "Seleccionaste Volver al Menu Principal\n";
            $this->menu($opcionUsuario);
            self::run();
        }
    }

    function subMenuProveedores() {
        $opcionUsuario = readline("Selecciona una opción: ");
        switch ($opcionUsuario){
        case '1':
           echo "Seleccionaste Dar de Alta Proveedores\n";
           $nombre = readline("Ingrese nombre: ");
           $direccion = readline("Ingresar direccion: ");
           $telefono = readline("Ingrese telefono: ");
           $CorreoElectronico = readline("Ingrese el correo electronico: ");
           $id=null;
           $proveedor = new Proveedor($id, $nombre, $direccion, $telefono, $CorreoElectronico);
           $this->gestionProveedores->agregarProveedor($proveedor);
           break;
       case '2':
           echo "Seleccionaste Dar de Baja Proveedores\n";
           $this->gestionProveedores->listarProveedores();
           echo "Ingrese el nombre del Proveedor a eliminar: ";
           $nombre = readline();
           $ProveedorEliminado = $this->gestionProveedores->eliminarProveedorPorNombre($nombre);
           if ($ProveedorEliminado) {
               echo "Proveedor con nombre $nombre ha sido eliminado correctamente.\n";
           } else {
               echo "\n No se pudo eliminar Proveedor con el nombre $nombre. \n";
           }
           break;
       case '3':
           echo "Seleccionaste Modificar Datos de Proveedor\n";
           $nombreModificar = readline("Ingrese el nombre del Proveedor a modificar: ");
           $proveedorEncontrado = $this->gestionProveedores->buscarProveedorPorNombre($nombreModificar);
           if ($proveedorEncontrado) {
               $nombreNuevo = readline("Ingrese el nuevo nombre del proveedor: ");
               $direccionNueva = readline("Ingrese la nueva direccion del proveedor: ");
               $telefonoNuevo = readline("Ingrese el nuevo telefono del proveedor: ");
               $emailNuevo = readline("Ingrese el nuevo correo del proveedor: ");
               $this->gestionProveedores->modificarProveedorPorNombre($nombreModificar, $nombreNuevo, $direccionNueva, $telefonoNuevo, $emailNuevo);
               echo "Los datos del proveedor han sido modificados.\n";
           } else {
               echo "No se encontró ningún proveedor con ese nombre.\n";
           }
           break;
       case '4':
           $this->gestionProveedores->listarProveedores();
           break;
       case '0':
           echo "Seleccionaste Volver al Menu Principal\n";
           $this->menu($opcionUsuario);
           self::run();
       }
   }
    function subMenuProductos() {
        $opcionUsuario = readline("Selecciona una opción: \n");
        switch ($opcionUsuario){
            case '1':
                echo "Seleccionaste Dar de Alta Productos\n";
                $nombreProducto = readline("Ingrese el nombre del Producto: ");
                $descripcion = readline("Ingrese la descripcion del Producto: ");
                $precio = readline("Ingrese el precio del Producto: ");
                $id=null;
                $Producto = new Producto($id, $nombreProducto, $descripcion, $precio);
                $this->gestionProductos->agregarProducto($Producto);
                break;
            case '2':
                echo "Seleccionaste Modificar Datos del Producto\n";
                $this->gestionProductos->listarProductos();
                $nombreModificar = readline("Ingrese el nombre del producto a modificar: ");
                $productoEncontrado = $this->gestionProductos->buscarProductoPorNombre($nombreModificar);
                if ($productoEncontrado) {
                    $nombreNuevo = readline("Ingrese el nuevo nombre del producto: ");
                    $descripcionNueva = readline("Ingrese la nueva descripcion del producto: ");
                    $precioNuevo = readline("Ingrese el nuevo precio del producto: ");
                    $this->gestionProductos->modificarProductoPorNombre($nombreModificar, $nombreNuevo, $descripcionNueva, $precioNuevo);
                    echo "Los datos del producto han sido modificados correctamente.\n";
                } else {
                    echo "No se encontró ningún producto con el nombre $nombreModificar.\n";
                    }
                break;
            case '3':
                echo "Seleccionaste Listar Productos\n";
                $productos = $this->gestionProductos->listarProductos();
                break;
            case '0':
                echo "Seleccionaste Volver Al Menu Principal\n";
                $this->menu($opcionUsuario);
        }
    }

   function subMenuStock() {
       $opcionUsuario = readline("Selecciona una opción: \n");
       switch ($opcionUsuario){
           case '1':
               echo "Seleccionaste Dar de Alta Stock\n";
               $this->gestionProductos->listarProductos();
               $ID_Producto = readline("Ingrese el ID del Producto: ");
               $cantidad = readline("Ingrese la cantidad del Producto: ");
               $stock = new Stock($ID_Producto, $cantidad);
               $this->gestionStock->insertarStock($stock);
               break;
            case '2':
                $this->gestionStock->listarStock();
                break;
            case '0':
               echo "Seleccionaste Volver Al Menu Principal\n";
               $this->menu($opcionUsuario);
       }
   }

   function subMenuVentas() {
    $opcionUsuario = readline("Selecciona una opción: \n");
    switch ($opcionUsuario){
        case '1':
            echo "Seleccionaste Dar de Alta una Venta\n";
            $this->gestionCliente->listarClientes();
            $ID_Cliente = readline("Ingrese el ID del cliente que compra: ");
            $fecha = getdate();
            $this->gestionProductos->listarProductos();
            $ID_Producto = readline("Ingrese el ID del producto que compra: ");
            $cantidad = readline("Ingrese la cantidad que compra: ");            
            $precioUnitario=$this->gestionProductos->obtenerPrecio($ID_Producto)['precio'];
            $venta = new Venta($ID_Cliente, $fecha);
            $detalleVenta = new detalleVenta($cantidad,$precioUnitario, $ID_Producto); 
            $this->gestionVentas->vender($venta, $detalleVenta);
            break;
        case '0':
            echo "Seleccionaste Volver Al Menu Principal\n";
            $this->menu($opcionUsuario);
        }
    }
}  

$gestionCliente = new gestionCliente();
$gestionProveedores = new gestionProveedores();
$gestionProductos = new gestionProductos();
$gestionStock = new gestionStock();
$gestionVentas = new gestionVentas();
$vista = new Menuvista();

$menu= new Menu($gestionCliente, $gestionProveedores, $gestionProductos, $gestionStock, $gestionVentas, $vista);