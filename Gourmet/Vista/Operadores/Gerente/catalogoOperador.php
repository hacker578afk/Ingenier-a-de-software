
<h1>XD</h1>
<!-- catalogoOperador.php -->
<h2>Catálogo de Operadores</h2>

<table border="1">
    <tr>
        <th>ID</th>
        <th>Nombre</th>
        <th>Correo</th>
        <!-- Agrega más columnas según tu tabla -->
    </tr>
    <?php foreach ($operadores as $op): ?>
        <tr>
            <td><?= htmlspecialchars($op['IdOperador']) ?></td>
            <td><?= htmlspecialchars($op['Nombres']) ?></td>
            <td><?= htmlspecialchars($op['Email']) ?></td>
        </tr>
    <?php endforeach; ?>
</table>
