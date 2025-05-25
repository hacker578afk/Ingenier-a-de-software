<?php
require_once(__DIR__ . '/../conexion.php');

class loginClienteModel {
    public function autenticarCliente($email) {
        $db = Conexion::conectar();
        $sql = "SELECT * FROM Clientes WHERE Email = :email";
        $stmt = $db->prepare($sql);
        $stmt->bindValue(':email', $email);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    public function autentificarOperador($email){
        $db = Conexion::conectar();
        $sql = "SELECT * FROM Operadores WHERE Email = :email";
        $stmt = $db->prepare($sql);
        $stmt->bindValue(':email', $email);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
?>

