<?php
require_once(__DIR__ . '/../conexion.php');
require_once('Operador.php');

class cocinerModelo
{
    private $db;

    public function __construct()
    {
        $this->db = conexion::conectar();
    }

    public function comandas()
    {
        $sql = "
        SELECT 
            c.IdComanda,
            o.Nombres AS NombreOperador,
            p.Descripcion,
            d.Precio,
            COUNT(d.IdProductos) AS Cantidad,
            (d.Precio * COUNT(d.IdProductos)) AS Subtotal
        FROM Comanda c
        INNER JOIN Operadores o ON c.IdOperador = o.IdOperador
        INNER JOIN DetalleComandaProducto d ON c.IdComanda = d.IdComanda
        INNER JOIN Productos p ON d.IdProductos = p.IdProducto
        WHERE c.Estado = 0
        GROUP BY c.IdComanda, o.Nombres, p.Descripcion, d.Precio
        ORDER BY c.IdComanda DESC
    ";

        $stmt = $this->db->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function completarComanda($idComanda)
    {
        $stmt = $this->db->prepare("UPDATE Comanda SET Estado = 1 WHERE IdComanda = :idComanda");
        $stmt->bindParam(':idComanda', $idComanda, PDO::PARAM_INT);
        $stmt->execute();
    }
}
