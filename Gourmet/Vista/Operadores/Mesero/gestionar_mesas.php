<h1>Gestión de Mesas</h1>
<table>
    <tr>
        <th>ID Mesa</th>
        <th>Capacidad</th>
        <th>Estado</th>
    </tr>
    <?php foreach ($mesas as $mesa): ?>
        <tr>
            <td><?php echo $mesa['IdMesa']; ?></td>
            <td><?php echo $mesa['Capacidad']; ?></td>
            <td><?php echo $mesa['Estado'] === '1' ? 'Disponible' : 'Ocupada'; ?></td>
        </tr>
    <?php endforeach; ?>
</table>