<?php
    require 'database.php';
    $cantidad = $_POST['cantidad'];
    $total = $_POST['total'];
    $fecha = $_POST['fecha'];
    $id_producto = $_POST['id_producto'];
    $id_cliente = $_POST['id_cliente'];
    
    function guardar_compra($cantidad,$total,$fecha,$id_producto,$id_cliente){
        global $conn; // Accedemos a la conexión definida en database.php
        
        // Consulta SQL para insertar cliente
        $sql = "INSERT INTO compra (cantidad, total, fecha, id_producto, id_cliente) 
                VALUES ('$cantidad', '$total', '$fecha' , '$id_producto','$id_cliente')";
    
        if (mysqli_query($conn, $sql)) {
        echo "<h1>compra creado con exito!</h1>";
        echo "descripcion: <b>" . $cantidad . "</b></br>";
        echo "tipo: <b>" . $total . "</b></br>";
        echo "producto: <b>" . $fecha . "</b></br>";
        echo "unidades: <b>" . $id_producto . "</b></br>";
        echo "unidades: <b>" . $id_cliente . "</b></br>";
        } else {
        echo "Error al insertar compra: " . mysqli_error($conn);
        }

        // Cierra la conexión
        mysqli_close($conn);    
    }
    guardar_compra($cantidad,$total,$fecha,$id_producto,$id_cliente);
?>