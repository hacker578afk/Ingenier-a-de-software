<?php
// config.php
define('BASE_URL', '/Gourmet/');

class conexion {
    public static function conectar() {
        try {
            $conn = new PDO("sqlsrv:Server=localhost;Database=RestauranteGourmet");
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            echo "Conexión exitosa a SQL Server.";
            return $conn;
        } catch (PDOException $e) {
            die("Error en la conexión: " . $e->getMessage());
        }
    }
}
