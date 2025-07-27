<?php
    require 'database.php';
    $nombre_cli = $_POST['nombre_cli'];
    $email = $_POST['email'];
    $direccion = $_POST['direccion'];
    
    function crear_cliente($nombre_cli, $email, $direccion) {
        global $conn; // Accedemos a la conexión definida en database.php

        // Consulta SQL para insertar cliente
        $sql = "INSERT INTO cliente (nombre, email, direccion) 
                VALUES ('$nombre_cli', '$email', '$direccion')";

        if (mysqli_query($conn, $sql)) {
            echo "<h1>¡Cliente creado con éxito!</h1>";
            echo "Nombre: <b>" . htmlspecialchars($nombre_cli) . "</b><br>";
            echo "Email: <b>" . htmlspecialchars($email) . "</b><br>";
            echo "Dirección: <b>" . htmlspecialchars($direccion) . "</b><br><br>";
        } else {
            echo "Error al insertar cliente: " . mysqli_error($conn);
        }

        // Cierra la conexión
        mysqli_close($conn);
    }
    crear_cliente($nombre_cli,$email,$direccion);
?>
