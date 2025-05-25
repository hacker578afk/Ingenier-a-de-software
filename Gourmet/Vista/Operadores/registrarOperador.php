<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registrar Operador</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 30px; background-color: #f4f4f4; }
        .form-container { background-color: #fff; padding: 20px; border-radius: 8px; width: 400px; margin: auto; box-shadow: 0 0 10px rgba(0,0,0,0.1); }
        h2 { text-align: center; }
        label { display: block; margin-top: 10px; }
        input, select { width: 100%; padding: 8px; margin-top: 5px; }
        button { margin-top: 15px; width: 100%; padding: 10px; background-color: #007BFF; border: none; color: white; border-radius: 4px; cursor: pointer; }
        button:hover { background-color: #0056b3; }
    </style>
</head>
<body>
    <div class="form-container">
        <h2>Registrar Operador</h2>
        <form action="../Controlador/operadorControlador.php" method="post">
            <input type="hidden" name="accion" value="insertar">

            <label for="nombres">Nombres:</label>
            <input type="text" name="nombres" required>

            <label for="apellidos">Apellidos:</label>
            <input type="text" name="apellidos" required>

            <label for="email">Correo Electrónico:</label>
            <input type="email" name="email" required>

            <label for="contrasena">Contraseña:</label>
            <input type="password" name="contrasena" required>

            <label for="idTiposOperador">Tipo de Operador:</label>
            <select name="idTiposOperador" required>
                <option value="">Seleccione...</option>
                <option value="1">Gerente</option>
                <option value="2">Mesero</option>
                <option value="3">Cajero</option>
                <option value="4">Chef</option>
                <option value="5">Recepcionista</option>
            </select>

            <label for="idMensas">Mesa Asignada (opcional):</label>
            <input type="number" name="idMensas" min="1">

            <button type="submit">Registrar</button>
        </form>
    </div>
</body>
</html>









