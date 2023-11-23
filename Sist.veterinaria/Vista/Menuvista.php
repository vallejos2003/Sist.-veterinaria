<?php

class Menuvista {
    public function mostrarMenuPrincipal() {
        $opcionesMenuPrincipal = [
            "Gestionar Clientes",
            "Gestionar Proveedores",
            "Gestionar Productos",
            "Gestionar Stock",
            "Gestionar Ventas"
        ];
        $this->mostrarMenu($opcionesMenuPrincipal);
    }
    public function mostrarSubMenuClientes() {
        $opcionesClientes = ["Dar de Alta", "Dar de Baja", "Modificar Datos", "Listar"];
        $this->mostrarMenu($opcionesClientes);
    }
    public function mostrarSubMenuProveedores() {
        $opcionesProveedores = ["Dar de Alta", "Dar de Baja", "Modificar Datos", "Listar"];
        $this->mostrarMenu($opcionesProveedores);
    }
    public function mostrarSubMenuProductos() {
        $opcionesProductos = ["Dar de Alta", "Modificar Datos", "Listar"];
        $this->mostrarMenu($opcionesProductos);
    }
    public function mostrarSubMenuStock() {
        $opcionesStock = ["Dar de Alta", "Ver Stock"];
        $this->mostrarMenu($opcionesStock);
    }
    public function mostrarSubMenuVentas() {
        $opcionesVentas = ["Vender"];
        $this->mostrarMenu($opcionesVentas);
    }
    private function mostrarMenu(array $opciones) {
        echo "Bienvenido Proveeduria Central\n";
        echo "Menú\n";
        foreach ($opciones as $index => $opcion) {
            printf("%-2s. %s\n", $index + 1, $opcion);
        }
        echo "0 . Salir\n";
    }  
}