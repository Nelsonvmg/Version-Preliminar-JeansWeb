<?php
include '../0 Conexión Global BD/conexion.php';

// Obtener los datos del formulario
$idProducto = $_POST['id_producto'];
$nombreProducto = $_POST['nombre_producto'];
$descripcionProducto = $_POST['descripcion_producto'];
$tallaProducto = $_POST['talla_producto'];
$colorProducto = $_POST['color_producto'];
$lineaProducto = $_POST['linea_producto'];
$cantidadProducto = $_POST['cantidad_producto'];
$fechaCompra = $_POST['fecha_compra'];
$precioCompra = $_POST['precio_compra'];
$precioVenta = $_POST['precio_venta'];
$proveedor = $_POST['proveedor'];
$telefono = $_POST['telefono'];
$direccion = $_POST['direccion'];
$estado = $_POST['Estado'];

// Actualizar el registro en la base de datos
$sql = "UPDATE stock SET
    nombre_producto = '$nombreProducto',
    descripcion_producto = '$descripcionProducto',
    talla_producto = '$tallaProducto',
    color_producto = '$colorProducto',
    linea_producto = '$lineaProducto',
    cantidad_producto = '$cantidadProducto',
    fecha_compra = '$fechaCompra',
    precio_compra = '$precioCompra',
    precio_venta = '$precioVenta',
    proveedor = '$proveedor',
    telefono = '$telefono',
    direccion = '$direccion',
    estado = '$estado'
    WHERE id_producto = '$idProducto'";

// Ejecutar la consulta SQL
if ($conn->query($sql) === TRUE) {
    echo "<script>alert('Actualización exitosa.');</script>";
    echo "<script>window.close();</script>";
} else {
   echo '<script>alert("Error al actualizar el registro: ' . $conn->error . '"); window.close();</script>';
}

// Cerrar la conexión a la base de datos
$conn->close();

?>
