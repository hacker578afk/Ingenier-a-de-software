<?php
session_start();
require_once('../../Modelo/Clientes/loginClienteModel.php');

class loginClienteController
{
    // function __construct()
    // {
    //     // Inicializa el modelo
    //     $this->login = new loginClienteModel();
    // }
    public function logout()
    {
        $_SESSION = [];
        session_destroy();
        header('Location: ../../Vista/Clientes/loginCliente.php');
        exit();
    }

    public function autenticar()
    {
        $mensaje = '';

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['email'] ?? '';
            $contrasena = $_POST['contrasena'] ?? '';

            $login = new loginClienteModel();
            $cliente = $login->autenticarCliente($email);

            if ($cliente && $cliente['Contrasena'] === $contrasena) {
                $_SESSION['idUsuario'] = $cliente['IdClientes'];
                $_SESSION['nombre'] = $cliente['Nombres'];
                $_SESSION['tipo'] = 'Cliente';
                header('Location: ../../Vista/Clientes/dashboardCliente.php');
                exit();
            }

            $operador = $login->autentificarOperador($email);

            if ($operador && $operador['Contrasena'] === $contrasena) {
                $_SESSION['idUsuario'] = $operador['IdOperadores'];
                $_SESSION['nombre'] = $operador['Nombres'];
                $_SESSION['tipo'] = 'Operador';
                $_SESSION['rol'] = $operador['IdTiposOperador'];

                switch ($operador['IdTiposOperador']) {
                    case 1:
                        header('Location: ../../Vista/Operadores/Gerente/dashboardGerente.php');
                        break;
                    case 2:
                        header('Location: ../../Vista/Mesero/Operadores/dashboardMesero.php');
                        break;
                    case 3:
                        header('Location: ../../Vista/Cajero/dashboardCajero.php');
                        break;
                    case 4:
                        header('Location: ../../Vista/Chef/dashboardChef.php');
                        break;
                    case 5:
                        header('Location: ../../Vista/Recepcionista/dashboardRecepcionista.php');
                        break;
                    default:
                        $_SESSION['login_error'] = 'Tipo de operador no válido.';
                        header('Location: ../../Vista/Clientes/loginCliente.php');
                        break;
                }
                exit();
            }

            $_SESSION['login_error'] = 'Usuario o contraseña incorrecta.';
            header('Location: ../../Vista/Clientes/loginCliente.php');
            exit();
        }
    }
}

// ✅ Instancia una sola vez
$controller = new loginClienteController();

// 🔁 Ejecuta acción según lo recibido
if (isset($_GET['action']) && $_GET['action'] === 'logout') {
    $controller->logout();
} elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $controller->autenticar();
}
