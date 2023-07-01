<?php
include '../0 Conexión Global BD/conexion.php';

// Verificar si se recibieron los datos del formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos del formulario
    $idProducto = $_POST["id_producto"];
    $nombreProducto = $_POST["nombre_producto"];
    $descripcionProducto = $_POST["descripcion_producto"];
    $tallaProducto = $_POST["talla_producto"];
    $colorProducto = $_POST["color_producto"];
    $lineaProducto = $_POST["linea_producto"];
    $cantidadProducto = $_POST["cantidad_producto"];
    $fechaCompra = $_POST["fecha_compra"];
    $precioCompra = $_POST["precio_compra"];
    $precioVenta = $_POST["precio_venta"];
    $proveedor = $_POST["proveedor"];
    $telefono = $_POST["telefono"];
    $direccion = $_POST["direccion"];

    // Crear la consulta SQL para la inserción de los datos en la tabla
    $sql = "INSERT INTO stock (
    id_producto, 
    nombre_producto, 
    descripcion_producto, 
    talla_producto, 
    color_producto, 
    linea_producto, 
    cantidad_producto, 
    fecha_compra, 
    precio_compra, 
    precio_venta, 
    proveedor, 
    telefono, 
    direccion)
    VALUES (
    '$idProducto', 
    '$nombreProducto', 
    '$descripcionProducto', 
    '$tallaProducto', 
    '$colorProducto', 
    '$lineaProducto', 
    '$cantidadProducto', 
    '$fechaCompra', 
    '$precioCompra', 
    '$precioVenta', 
    '$proveedor', 
    '$telefono', 
    '$direccion')";

    // Ejecutar la consulta SQL
    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Registro Exitoso.');</script>";
    echo "<script>window.close();</script>";
    } else {
        echo '<script>alert("Producto actualmente ya registrado."); window.close();</script>'. $conn->error;
    }

    // Cerrar la conexión a la base de datos
    $conn->close();
}
?>
