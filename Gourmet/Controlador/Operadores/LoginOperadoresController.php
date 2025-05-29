<?php
session_start();
require_once('../../Modelo/Clientes/loginClienteModel.php'); // O usa otro modelo para operadores si tienes

class loginOperadorController
{
    private $login;

    public function __construct()
    {
        $this->login = new loginClienteModel(); // Cambia si tienes modelo separado para operadores
    }

    public function logout()
    {
        $_SESSION = [];
        session_destroy();
        header('Location: ../../Vista/Operadores/loginOperador.php'); // Ruta para login operador
        exit();
    }

    public function autenticar()
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            header('Location: ../../Vista/Operadores/login_operador.php');
            exit();
        }

        $email = $_POST['email'] ?? '';
        $contrasena = $_POST['contrasena'] ?? '';

        $operador = $this->login->autentificarOperador($email);

        if ($operador && $operador['Contrasena'] === $contrasena) {
            $_SESSION['idUsuario'] = $operador['IdOperador'];
            $_SESSION['nombre'] = $operador['Nombres'];
            $_SESSION['tipo'] = 'Operador';
            $_SESSION['rol'] = $operador['IdTiposOperador'];

            switch ($operador['IdTiposOperador']) {
                case 1:
                    header('Location: ../../Vista/Operadores/Gerente/dashboardGerente.php');
                    break;
                case 2:
                    header('Location: ../../Vista/Operadores/Mesero/mesero_inicio.php');
                    break;
                case 3:
                    header('Location: ../Operadores/CajeroController.php?accion=caja');
                    break;
                case 4:
                    header('Location: ../Operadores/CocineroController.php?accion=index');
                    break;
                case 5:
                    header('Location: ../Operadores/RecepcionistaController.php?accion=reservaciones');
                    break;
                default:
                    $_SESSION['login_error'] = 'Tipo de operador no válido.';
                    header('Location: ../../Vista/Operadores/loginOperador.php');
                    break;
            }
            exit();
        } else {
            $_SESSION['login_error'] = 'Usuario o contraseña incorrecta.';
            header('Location: ../../Vista/Operadores/loginOperador.php');
            exit();
        }
    }
}

$controller = new loginOperadorController();

if (isset($_GET['action']) && $_GET['action'] === 'logout') {
    $controller->logout();
} elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $controller->autenticar();
}
