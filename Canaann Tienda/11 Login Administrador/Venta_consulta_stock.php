<?php

include '../0 Conexión Global BD/conexion.php';

// Obtener la referencia del producto enviada por el formulario
$referenciaProducto = $_POST["id_producto"];

// Consulta para obtener los datos del producto por referencia
$sql = "SELECT * FROM stock WHERE id_producto = '$referenciaProducto'";
$result = $conn->query($sql);

// Comprobar si se encontró algún resultado
if ($result->num_rows > 0) {
    // Producto encontrado, devolver los datos del producto como respuesta en formato JSON
    $producto = $result->fetch_assoc();
    echo json_encode($producto);
} else {
    // Producto no encontrado, devolver una respuesta indicando que no existe
    $response = array("error" => "Producto no encontrado");
    echo json_encode($response);
}

$conn->close();
?>