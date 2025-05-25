<?php
require_once(__DIR__ . '/../conexion.php');
require_once(__DIR__ . '/cliente.php');
class CrudClientes {
    // ... (otros métodos)

    public function obtenerTiposClientes() {
        try {
            $db = Conexion::conectar();
            $sql = "SELECT * FROM TiposClientes";
            $stmt = $db->query($sql);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            error_log("Error al obtener tipos de clientes: " . $e->getMessage());
            return [];
        }
    }

    public function insertar(Cliente $cliente) {
        try {
            $db = Conexion::conectar();
            $sql = "INSERT INTO Clientes (Nombres, Apellidos, Email, Contrasena, IdTipos, IdMesas) 
                    VALUES (:nombres, :apellidos, :email, :contrasena, :idTipos, :idMesas)";
            
            $stmt = $db->prepare($sql);
            $stmt->bindValue(':nombres', $cliente->getNombres());
            $stmt->bindValue(':apellidos', $cliente->getApellidos());
            $stmt->bindValue(':email', $cliente->getEmail());
            $stmt->bindValue(':contrasena', $cliente->getContrasena());
            $stmt->bindValue(':idTipos', $cliente->getIdTipos(), PDO::PARAM_INT);
            $stmt->bindValue(':idMesas', $cliente->getIdMesas(), PDO::PARAM_INT);
            
            return $stmt->execute();
        } catch (PDOException $e) {
            error_log("Error al insertar cliente: " . $e->getMessage());
            return false;
        }
    }
}
?>