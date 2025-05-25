<?php
session_start();
require_once('../../Modelo/loginModel.php');

$mensaje = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $contrasena = $_POST['contrasena'];

    $login = new LoginModel();
    $usuario = $login->autenticar($email); // ✅ AQUÍ estaba faltando

    if ($usuario) {
        if ($usuario['Contrasena'] === $contrasena) {
            $_SESSION['idUsuario'] = $usuario['IdOperador'];
            $_SESSION['nombre'] = $usuario['Nombres'];
            $_SESSION['tipo'] = $usuario['Descripcion'];

            // Redirige según el tipo de operador
            switch ($_SESSION['tipo']) {
                case 'Gerente':
                    header('Location: ../../Vista/Operadores/Gerente/dashboardGerente.php');
                    break;
                case 'Cajero':
                    header('Location: ../../Vista/Operadores/Cajero/dashboardCajero.php');
                    break;
                case 'Chef':
                    header('Location: ../../Vista/Operadores/Chef/dashboardChef.php');
                    break;
                case 'Mesero':
                    header('Location: ../../Vista/Operadores/Mesero/dashboardMesero.php');
                    break;
                case 'Recepcionista':
                    header('Location: ../../Vista/Operadores/Recepcionista/dashboardRecepcionista.php');
                    break;
                default:
                    $_SESSION['login_error'] = "Tipo de operador no válido.";
                    header("Location: ../../Vista/Operadores/loginOperador.php");
            }
            exit();
        } else {
            $mensaje = "Contraseña incorrecta.";
        }
    } else {
        $mensaje = "Usuario no encontrado.";
    }

    $_SESSION['login_error'] = $mensaje;
    header("Location: ../../Vista/Operadores/loginOperador.php");
    exit();
}
?>
