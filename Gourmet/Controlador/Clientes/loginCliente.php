<?php
session_start();
require_once('../../Modelo/Clientes/loginClienteModel.php');

class loginClienteController
{
    private $login;

    public function __construct()
    {
        $this->login = new loginClienteModel();
    }

    public function logout()
    {
        $_SESSION = [];
        session_destroy();
        header('Location: ../../Vista/Clientes/loginCliente.php');
        exit();
    }

    public function autenticar()
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            header('Location: ../../Vista/Clientes/loginCliente.php');
            exit();
        }

        $email = $_POST['email'] ?? '';
        $contrasena = $_POST['contrasena'] ?? '';

        $cliente = $this->login->autenticarCliente($email);

        if ($cliente && $cliente['Contrasena'] === $contrasena) {
            $_SESSION['idUsuario'] = $cliente['IdClientes'];
            $_SESSION['nombre'] = $cliente['Nombres'];
            $_SESSION['tipo'] = 'Cliente';

            header('Location: ../../Vista/Clientes/dashboardCliente.php');
            exit();
        } else {
            $_SESSION['login_error'] = 'Usuario o contraseña incorrecta.';
            header('Location: ../../Vista/Clientes/loginCliente.php');
            exit();
        }
    }
}

// Instancia y manejo simple de acciones
$controller = new loginClienteController();

if (isset($_GET['action']) && $_GET['action'] === 'logout') {
    $controller->logout();
} elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $controller->autenticar();
}
