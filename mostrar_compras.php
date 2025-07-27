<?php
require 'database.php';

// Consulta para obtener los clientes con más de 2 compras
$sql = "SELECT 
            cliente.id_cliente,
            cliente.nombre,
            cliente.email,
            COUNT(compra.id_compra) AS total_compras
        FROM 
            cliente
        JOIN 
            compra ON cliente.id_cliente = compra.id_cliente
        GROUP BY 
            cliente.id_cliente, cliente.nombre, cliente.email
        HAVING 
            COUNT(compra.id_compra) > 2";

$resultado = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Clientes frecuentes</title>
</head>
<body>

    <h1>Clientes con más de 2 compras</h1>

    <table>
        <thead>
            <tr>
                <th>ID Cliente</th>
                <th>Nombre</th>
                <th>Email</th>
                <th>Total de Compras</th>
            </tr>
        </thead>
        <tbody>
            <?php if (mysqli_num_rows($resultado) > 0): ?>
                <?php while($fila = mysqli_fetch_assoc($resultado)): ?>
                    <tr>
                        <td><?= $fila['id_cliente'] ?></td>
                        <td><?= $fila['nombre'] ?></td>
                        <td><?= $fila['email'] ?></td>
                        <td><?= $fila['total_compras'] ?></td>
                    </tr>
                <?php endwhile; ?>
            <?php else: ?>
                <tr>
                    <td>No hay clientes con más de 2 compras.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>

</body>
</html>

<?php
mysqli_close($conn); // Cerramos la conexión
?>
