<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <title>Registrar Tarjeta</title>
  <style>
  /* Estilos generales para el body y centrado */
body {
  font-family: Arial, sans-serif;
  background-color: #f4f6f8;
  margin: 0;
  min-height: 100vh;

  /* Usamos flexbox en columna para ordenar título y formulario */
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: flex-start;
  padding: 40px 20px;
}

/* Estilo para el título principal */
h1 {
  color: #333;
  margin-bottom: 30px; /* espacio para separar del formulario */
  text-align: center;
  width: 100%;
  max-width: 400px;
}

/* Estilos para el formulario */
form {
  width: 100%;
  max-width: 400px;
  background-color: #fff;
  padding: 30px 35px;
  border-radius: 10px;
  box-shadow: 0 4px 20px rgba(0,0,0,0.1);
  box-sizing: border-box; /* incluye padding dentro del ancho */
}

/* Etiquetas de los campos */
label {
  display: block;
  margin-bottom: 6px;
  font-weight: 600;
  color: #444;
}

/* Campos de texto y número */
input[type="text"],
input[type="number"] {
  width: 100%;
  padding: 10px 12px;
  margin-bottom: 18px;
  border: 1.5px solid #ccc;
  border-radius: 6px;
  font-size: 16px;
  transition: border-color 0.3s ease;
  box-sizing: border-box;
}

/* Efecto foco en los inputs */
input[type="text"]:focus,
input[type="number"]:focus {
  border-color: #007bff;
  outline: none;
}

/* Campo readonly */
input[readonly] {
  background-color: #e9ecef;
  cursor: not-allowed;
}

/* Botón enviar */
input[type="submit"] {
  background-color: #007bff;
  color: white;
  border: none;
  padding: 12px 0;
  width: 100%;
  font-size: 18px;
  font-weight: 600;
  border-radius: 6px;
  cursor: pointer;
  transition: background-color 0.3s ease;
}

/* Hover del botón */
input[type="submit"]:hover {
  background-color: #0056b3;
}

  </style>
</head>
<body>

  <h1>Registrar Tarjeta</h1>

  <form action="CajeroController.php?accion=registrarPago&id=<?= $idComanda ?>" method="post">
    <input type="hidden" name="id_comanda" value="<?php echo isset($_GET['id']) ? htmlspecialchars($_GET['id']) : ''; ?>">

    <label for="nombre">Nombre en la tarjeta:</label>
    <input type="text" id="nombre" name="nombre" maxlength="50" required>

    <label for="numero_tarjeta">Número de tarjeta:</label>
    <input type="text" id="numero_tarjeta" name="numero_tarjeta" maxlength="16" required>

    <label for="expiracion">Fecha de expiración (MM/AA):</label>
    <input type="text" id="expiracion" name="expiracion" maxlength="5" required>

    <label for="cvv">CVV:</label>
    <input type="text" id="cvv" name="cvv" maxlength="4" required>

    <label for="monto">Monto:</label>
    <input type="number" id="monto" name="monto" step="0.01" value="<?= htmlspecialchars($monto) ?>" readonly>

    <input type="submit" value="Pagar">
  </form>

</body>
</html>
