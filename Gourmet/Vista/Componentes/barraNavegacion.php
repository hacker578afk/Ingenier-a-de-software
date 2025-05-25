<?php
require_once(__DIR__ .'/../Controlador/seguridadControlador.php');
Seguridad::verificarSesion(); // Asegura que haya sesión activa
?>

<div style="background-color: #333; color: white; padding: 10px; display: flex; justify-content: space-between; align-items: center;">
    <div>
        Bienvenido, <?php echo htmlspecialchars($_SESSION['nombre']); ?> (<?php echo htmlspecialchars($_SESSION['tipo']); ?>)
    </div>
    <div>
        <a href="../../Controlador/logout.php" style="color: white; text-decoration: none; background-color: #e74c3c; padding: 6px 12px; border-radius: 4px;">Cerrar sesión</a>
    </div>
</div>
