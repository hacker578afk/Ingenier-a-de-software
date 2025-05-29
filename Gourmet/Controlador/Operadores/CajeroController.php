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
            $monto = $_GET['monto'] ?? 0; // Obtener el monto si está disponible

            include('../../Vista/Operadores/Cajero/registrar_tarjeta.php');
        } else {
            echo "ID de comanda no especificado.";
        }
        exit();
    }
    public function registrarPago()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Obtener datos del formulario
            $idComanda = $_POST['id_comanda'] ?? null;
            $nombre = $_POST['nombre'] ?? '';
            $numeroTarjeta = $_POST['numero_tarjeta'] ?? '';
            $expiracion = $_POST['expiracion'] ?? '';
            $cvv = $_POST['cvv'] ?? '';
            $monto = $_POST['monto'] ?? 0;

            // Validación básica
            if (!$idComanda || !$nombre || !$numeroTarjeta || !$expiracion || !$cvv || $monto <= 0) {
                echo "Error: Datos incompletos o inválidos.";
                return;
            }
            $this->modelo->pagoTarjeta([
                'idComanda' => $idComanda,
                'nombre' => $nombre,
                'numeroTarjeta' => $numeroTarjeta,
                'expiracion' => $expiracion,
                'cvv' => $cvv,
                'monto' => $monto
            ]);
        }
        $this->caja(); // Redirigir a la vista de caja después de registrar el pago
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
