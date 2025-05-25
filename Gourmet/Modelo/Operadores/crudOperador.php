<?php
require_once('conexion.php');
require_once('Operador.php');

class crudOperador {

    public function __construct() {}

    // Insertar nuevo operador
    public function insertar(Operador $operador) {
        $db = conexion::conectar();
        $sql = "INSERT INTO Operadores (Nombres, Apellidos, Email, Contrasena, IdTiposOperador, IdMensas)
                VALUES (:nombres, :apellidos, :email, :contrasena, :idTiposOperador, :idMensas)";
        $stmt = $db->prepare($sql);
        $stmt->bindValue(':nombres', $operador->getNombres());
        $stmt->bindValue(':apellidos', $operador->getApellidos());
        $stmt->bindValue(':email', $operador->getEmail());
        $stmt->bindValue(':contrasena', $operador->getContrasena());
        $stmt->bindValue(':idTiposOperador', $operador->getIdTiposOperador());
        $stmt->bindValue(':idMesas', $operador->getIdMesas());
        $stmt->execute();
    }

    // Obtener todos los operadores
    public function mostrar() {
        $db = conexion::conectar();
        $lista = [];
        $sql = "SELECT * FROM Operadores";
        foreach ($db->query($sql) as $row) {
            $operador = new Operador();
            $operador->setIdOperador($row['IdOperador']);
            $operador->setNombres($row['Nombres']);
            $operador->setApellidos($row['Apellidos']);
            $operador->setEmail($row['Email']);
            $operador->setContrasena($row['Contrasena']);
            $operador->setIdTiposOperador($row['IdTiposOperador']);
            $operador->setIdMesas($row['IdMesas']);
            $lista[] = $operador;
        }
        return $lista;
    }

    // Obtener uno por ID
    public function obtener($idOperador) {
        $db = conexion::conectar();
        $sql = "SELECT * FROM Operadores WHERE IdOperador = :id";
        $stmt = $db->prepare($sql);
        $stmt->bindValue(':id', $idOperador);
        $stmt->execute();
        $row = $stmt->fetch();

        $operador = new Operador();
        $operador->setIdOperador($row['IdOperador']);
        $operador->setNombres($row['Nombres']);
        $operador->setApellidos($row['Apellidos']);
        $operador->setEmail($row['Email']);
        $operador->setContrasena($row['Contrasena']);
        $operador->setIdTiposOperador($row['IdTiposOperador']);
        $operador->setIdMesas($row['IdMensas']);
        return $operador;
    }

    // Actualizar operador
    public function actualizar(Operador $operador) {
        $db = conexion::conectar();
        $sql = "UPDATE Operadores SET 
                    Nombres = :nombres,
                    Apellidos = :apellidos,
                    Email = :email,
                    Contrasena = :contrasena,
                    IdTiposOperador = :idTiposOperador,
                    IdMensas = :idMensas
                WHERE IdOperador = :id";
        $stmt = $db->prepare($sql);
        $stmt->bindValue(':id', $operador->getIdOperador());
        $stmt->bindValue(':nombres', $operador->getNombres());
        $stmt->bindValue(':apellidos', $operador->getApellidos());
        $stmt->bindValue(':email', $operador->getEmail());
        $stmt->bindValue(':contrasena', $operador->getContrasena());
        $stmt->bindValue(':idTiposOperador', $operador->getIdTiposOperador());
        $stmt->bindValue(':idMensas', $operador->getIdMesas());
        $stmt->execute();
    }

    // Eliminar operador
    public function eliminar($idOperador) {
        $db = conexion::conectar();
        $sql = "DELETE FROM Operadores WHERE IdOperador = :id";
        $stmt = $db->prepare($sql);
        $stmt->bindValue(':id', $idOperador);
        $stmt->execute();
    }
}
?>
