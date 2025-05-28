<h1>Reporte Ventas</h1>
<div class="container-pedidos">
    <h1>Peidos</h1>
    <table>
        <tr>
            <th>id pedido </th>
            <th>id Operador</th>
            <th>Estado</th>
            <th>Total</th>
        </tr>
        <tr>
        <?php foreach($ventas['Comanda'] as $comanda): ?>
            <td><?php echo $comanda['IdComanda']; ?></td>
            <td><?php echo $comanda['IdOperador']; ?></td>
            <td><?php echo $comanda['Estado']; ?></td>
            <td><?php echo $comanda['Total']; ?></td>
            <?php endforeach; ?>
        </tr>
    </table>
</div>
<div class="container-comandas">
    <table>
        <tr>
            <th>

            </th>
        </tr>
    </table>
</div>