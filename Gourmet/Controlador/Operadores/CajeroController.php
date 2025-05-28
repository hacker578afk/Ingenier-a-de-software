<?php
session_start();
require_once('../../Modelo/Operadores/cajeroModelo.php');

$mensaje = '';

class CajeroController
{
    private $modelo;

    public function __construct()
    {
        $this->modelo = new cajeroModelo();
    }

    public function caja()
    {
        $comandas = $this->modelo->comandas();
        include('../../Vista/Operadores/Cajero/inicio_cajero.php');
        exit();
    }
    public function pagoEfectivo()
    {
        if (isset($_GET['id'])) {
            $idComanda = $_GET['id'];
            $this->modelo->pagoEfectivo($idComanda); // le pasas el ID

            $mensaje = "Pago en efectivo realizado con éxito.";
            $comandas = $this->modelo->comandas(); // vuelves a obtener comandas
            include('../../Vista/Operadores/Cajero/inicio_cajero.php');
        } else {
            echo "ID de comanda no especificado.";
        }
        exit();
    }

    public function pagoTarjeta()
    {
        if (isset($_GET['id'])) {
            $idComanda = $_GET['id'];
            $this->modelo->pagoTarjeta($idComanda); // igual aquí

            $mensaje = "Pago con tarjeta realizado con éxito.";
            $comandas = $this->modelo->comandas();
            include('../../Vista/Operadores/Cajero/inicio_cajero.php');
        } else {
            echo "ID de comanda no especificado.";
        }
        exit();
    }
}

// Instancia del controlador
$controller = new CajeroController();

if (isset($_GET['accion'])) {
    $accion = $_GET['accion'];

    if (method_exists($controller, $accion)) {
        $controller->$accion();
    } else {
        echo "Función no encontrada.";
    }
} else {
    echo "Ninguna acción especificada.";
}
