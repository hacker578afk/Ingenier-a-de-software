<?php
session_start();
$mensaje = $_SESSION['login_error'] ?? '';
unset($_SESSION['login_error']);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Login Operador</title>
</head>
<body>
    <h2>Iniciar sesión</h2>
    <?php if ($mensaje): ?>
        <p style="color:red;"><?php echo $mensaje; ?></p>
    <?php endif; ?>

    <form action="../../Controlador/Operadores/LoginOperador.php" method="post">
        <label>Correo electrónico:</label>
        <input type="email" name="email" required><br><br>

        <label>Contraseña:</label>
        <input type="password" name="contrasena" required><br><br>

        <input type="submit" value="Ingresar">
    </form>
</body>
</html>
