<?php
require_once(__DIR__ . '/../conexion.php');
require_once('Operador.php');

class GerenteModelo
{
    private $db;

    public function __construct()
    {
        $this->db = conexion::conectar();
    }

    public function obtenerTodosLosOperadores()
    {
        $stmt = $this->db->query("SELECT * FROM Operadores");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function obtenerTiposOperador()
    {
        $stmt = $this->db->query("SELECT * FROM TiposOperadores");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function insertar($operador)
    {
        $stmt = $this->db->prepare("INSERT INTO Operadores (Nombres, Apellidos, Email, Contrasena, IdTiposOperador) 
            VALUES (:nombres, :apellidos, :email, :contrasena, :idTiposOperador)");

        $stmt->bindParam(':nombres', $operador['nombres']);
        $stmt->bindParam(':apellidos', $operador['apellidos']);
        $stmt->bindParam(':email', $operador['email']);
        $stmt->bindParam(':contrasena', $operador['contrasena']);
        $stmt->bindParam(':idTiposOperador', $operador['idTiposOperador']);

        $stmt->execute();
    }

    public function obtenerVentas()
    {
        $ventas = [
            'comanda' => $this->db->query("SELECT * FROM Comanda c INNER JOIN DetalleComandaProducto d ON c.IdComanda = d.IdComanda")->fetchAll(PDO::FETCH_ASSOC),
            'pedido' => $this->db->query("SELECT * FROM Pedido p INNER JOIN DetallePedidoProducto d ON p.IdPedido = d.IdPedido")->fetchAll(PDO::FETCH_ASSOC)
        ];
        return $ventas;
    }
}
