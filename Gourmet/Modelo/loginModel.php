<?php
require_once('conexion.php');

class loginModel {
    public function autenticar($email) {
        $db = conexion::conectar();
        $sql = "SELECT * FROM Operadores INNER JOIN TiposOperadores
                ON Operadores.IdTiposOperador = TiposOperadores.IdTiposOperador
                WHERE Email = :email";

        $stmt = $db->prepare($sql);
        $stmt->bindValue(':email', $email);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
?>

