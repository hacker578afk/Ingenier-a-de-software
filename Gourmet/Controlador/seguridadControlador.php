<?php
class Seguridad
{

    // Inicia la sesión si no está iniciada
    public static function iniciarSesion()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
    }

    // Verifica que haya una sesión activa
    public static function verificarSesion()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        if (!isset($_SESSION['idUsuario'])) {
            header("Location: ../loginOperador.php");
            exit();
        }
    }

    // Verifica si el usuario tiene el rol esperado
    public static function verificarAcceso($tipoEsperado)
    {
        self::iniciarSesion();
        if (!isset($_SESSION['tipo']) || $_SESSION['tipo'] !== $tipoEsperado) {
            header("Location: ../Vista/AccesoDenegado.php");
            exit();
        }
    }

    // Métodos para verificar el tipo de usuario

    public static function esGerente()
    {
        self::iniciarSesion();
        return isset($_SESSION['tipo']) && $_SESSION['tipo'] === 'Gerente';
    }

    public static function esMesero()
    {
        self::iniciarSesion();
        return isset($_SESSION['tipo']) && $_SESSION['tipo'] === 'Mesero';
    }

    public static function esCajero()
    {
        self::iniciarSesion();
        return isset($_SESSION['tipo']) && $_SESSION['tipo'] === 'Cajero';
    }

    public static function esChef()
    {
        self::iniciarSesion();
        return isset($_SESSION['tipo']) && $_SESSION['tipo'] === 'Chef';
    }

    public static function esRecepcionista()
    {
        self::iniciarSesion();
        return isset($_SESSION['tipo']) && $_SESSION['tipo'] === 'Recepcionista';
    }

    public static function esCliente()
    {
        self::iniciarSesion();
        return isset($_SESSION['tipo']) && $_SESSION['tipo'] === 'Cliente';
    }
}
