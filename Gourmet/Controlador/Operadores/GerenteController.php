<?php
session_start();
require_once('../../Modelo/Operadores/gerenteModelo.php');

$mensaje = '';

class GerenteController
{
    private $modelo;

    public function __construct()
    {
        $this->modelo = new GerenteModelo();
    }

    public function catalogo()
    {
        $operadores = $this->modelo->obtenerTodosLosOperadores();
        include('../../Vista/Operadores/Gerente/catalogoOperador.php');
        exit();
    }

    public function agregarOperador()
    {
        $tiposOperador = $this->modelo->obtenerTiposOperador();
        include('../../Vista/Operadores/Gerente/agregarOperador.php');
        exit();
    }

    public function insertarOperador()
    {
        $datosOperador = [
            'nombres' => $_POST['nombres'],
            'apellidos' => $_POST['apellidos'],
            'email' => $_POST['email'],
            'contrasena' => $_POST['contrasena'],
            'idTiposOperador' => $_POST['tipoOperador']
        ];

        $this->modelo->insertar($datosOperador);

        header('Location: ../../Vista/Operadores/Gerente/dashboardGerente.php');
        exit();
    }

    public function reporteVentas()
    {
        $ventas = $this->modelo->obtenerVentas();
        include('../../Vista/Operadores/Gerente/reporteVentas.php');
        exit();
    }
}

// Instancia del controlador
$controller = new GerenteController();

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
