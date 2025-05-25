<?php
session_start();
$tiposClientes = $_SESSION['tiposClientes'] ?? [];
$error = $_SESSION['error_registro'] ?? '';
unset($_SESSION['error_registro']);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registro de Cliente</title>
    <style>
        .form-group { margin-bottom: 15px; }
        label { display: block; margin-bottom: 5px; }
        .error { color: red; }
    </style>
</head>
<body>
    <h2>Registro de Cliente</h2>
    <?php if ($error): ?>
        <p class="error"><?= htmlspecialchars($error) ?></p>
    <?php endif; ?>

    <form action="../../Controlador/Clientes/clienteControlador.php?action=registrar" method="post">
        <div class="form-group">
            <label>Nombres:</label>
            <input type="text" name="nombres" required>
        </div>
        
        <div class="form-group">
            <label>Apellidos:</label>
            <input type="text" name="apellidos" required>
        </div>
        
        <div class="form-group">
            <label>Email:</label>
            <input type="email" name="email" required>
        </div>
        
        <div class="form-group">
            <label>Contraseña:</label>
            <input type="password" name="contrasena" required>
        </div>
        
        
        <input type="submit" value="Registrarse">
    </form>
    
    <p>¿Ya tienes cuenta? <a href="loginCliente.php">Inicia sesión aquí</a></p>
</body>
</html>