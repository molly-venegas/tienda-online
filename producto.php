<?php
    require 'database.php';
    $nombre_prod = $_POST['nombre_prod'];
    $descripcion = $_POST['descripcion'];
    $precio = $_POST['precio'];
    $stock = $_POST['stock'];
    
    function crear_producto($nombre_prod,$descripcion,$precio,$stock){
        global $conn; // Accedemos a la conexión definida en database.php
        
        // Consulta SQL para insertar cliente
        $sql = "INSERT INTO producto (nombre, descripcion, precio, stock) 
                VALUES ('$nombre_prod', '$descripcion', '$precio' , '$stock')";
    
        if (mysqli_query($conn, $sql)) {
        echo "<h1>producto creado con exito!</h1>";
        echo "descripcion: <b>" . $nombre_prod . "</b></br>";
        echo "tipo: <b>" . $descripcion . "</b></br>";
        echo "producto: <b>" . $precio . "</b></br>";
        echo "unidades: <b>" . $stock . "</b></br>";
        } else {
        echo "Error al insertar producto: " . mysqli_error($conn);
        }

        // Cierra la conexión
        mysqli_close($conn);    
    }
    crear_producto($nombre_prod,$descripcion,$precio,$stock);
?>
