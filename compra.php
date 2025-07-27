<?php
require 'database.php'; // Conexión a la base de datos

// Obtener productos desde la tabla "producto"
$clientes = [];
$sql = "SELECT id_cliente, nombre FROM cliente";
$resultado = mysqli_query($conn, $sql);

if ($resultado) {
    while ($row = mysqli_fetch_assoc($resultado)) {
        $clientes[] = $row;
    }
}

// Obtener productos desde la tabla "producto"
$productos = [];
$sql = "SELECT id_producto, nombre FROM producto";
$resultado = mysqli_query($conn, $sql);

if ($resultado) {
    while ($row = mysqli_fetch_assoc($resultado)) {
        $productos[] = $row;
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
</head>
<body>
    <h1>Gestión de Tienda Online</h1>

    <h2>Agregar compra</h2>
    <form action="guardar_compra.php" method="post">
        cantidad: <input type="text" name="cantidad" required><br>
        total a pagar: <input type="text" name="total" required><br>
        fecha: <input type="date" name="fecha" required><br>

        producto:
        <select name="id_producto" required>
            <option value="">-- Selecciona un producto --</option>
            <?php foreach ($productos as $producto): ?>
                <option value="<?= $producto['id_producto'] ?>">
                    <?= $producto['nombre'] ?>
                </option>
            <?php endforeach; ?>
        </select><br>

        cliente: 
        <select name="id_cliente" required>
            <option value="">-- Seleccionar cliente --</option>
            <?php foreach ($clientes as $cliente): ?>
                <option value="<?= $cliente['id_cliente'] ?>">
                    <?= $cliente['nombre'] ?>
                </option>
            <?php endforeach; ?>
        </select><br>
        <button type="submit" name="guardar_compra">Guardar compra</button>
    </form>

</body>
</html>